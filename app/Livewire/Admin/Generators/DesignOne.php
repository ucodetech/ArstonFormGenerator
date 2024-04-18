<?php

namespace App\Livewire\Admin\Generators;

use App\Models\ArstonDesignOne;
use App\Models\ArstonDesignOneFAQ;
use App\Models\ArstonDesignOnePaymentPlan;
use Livewire\Component;
use App\Traits\WithRealPage;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use App\Traits\Datatable\WithSorting;
use App\Traits\Datatable\WithCachedRows;
use App\Traits\Datatable\WithBulkActions;
use App\Traits\Datatable\WithPerPagePagination;

#[Layout('layouts.app')]
class DesignOne extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows, WithRealPage;
    #region properties
        public bool $showDeleteModal = false;
        //post details
        public string $estate_name;
        public string $estate_address;
        public string $agreement_and_undertaking;
        public $design_id;
        //end of post details
        public string $modalTitle = '';
        public bool $showModelError = false; //use this method to hide inputs
        public bool $showFilters = false;
        public bool $showDesignOneModal =false;
        public bool $showDesignOneFAQModal = false;
        public bool $showDesignOnePPModal = false;
        public array $filters = [
            'search' => '',
            'filter-date-start' => null,
            'filter-date-end' => null,
        ];
        public string $msg = '';
        public string $question;
        public string $answer;
        public $pdf = [];
    #endregion
        protected $listeners = ['refreshTransactions' => '$refresh'];
    
        public function mount(){
            $this->cloneMount();
            $this->realPage = $this->grabPage();
    
        }
        protected function cloneMount(){
        }
        public function toggleShowFilters(){
            $this->useCachedRows();
            $this->showFilters = ! $this->showFilters;
        }
        public function updatedFilters() {
            $this->resetPage();
            $this->selectAll = false;
            $this->selectPage = false;
            $this->selected = [];
        }
    
        //protected method of deleteSelected method
        protected function deletedSelected() : void
        {
            $this->selectedRowsQuery->update([
                'deleted' => true,
            ]);
        }
        public function deleteSelected(): void
        {
            $this->deletedSelected();
            $this->selectAll = false;
            $this->selectPage = false;
            $this->showDeleteModal = false;
        }
        
    
        public function toggleGeneratePdf($id): void
        {
                $this->generatePdf($id);
        }
    
        public function generatePdf(int $id)
        {
           return redirect()->route('arston.form', ['id'=>$id]); 
        }
    
    
        public function exportSelected(){
            return response()->streamDownload(function (){
                echo ArstonDesignOne::whereKey($this->selected)->toCsv();
            }, 'designs.csv');
    
        }
        public function resetFilters(): void
        {
            $this->reset('filters');
        }
        public function getRowsQueryProperty(){
            return  $this->rowsQueries();
        }
        protected function rowsQueries(){
            $query = ArstonDesignOne::query()
                ->when($this->filters['filter-date-start'], fn($query, $date) => $query->where('created_at','>=', Carbon::parse($date)))
                ->when($this->filters['filter-date-end'], fn($query, $date) => $query->where('created_at','<=', Carbon::parse($date)))
                ->when($this->filters['search'], fn($query, $search) => $query->where('title','like', '%'.$search.'%'));
    //      
    
            return $this->applySorting($query);
        }
        public function getRowsProperty(){
            return  $this->grabCache( function () {
                return $this->applyPagination($this->rowsQuery);
            });
        }


        public function Upsert(int $id = null)
        {
            if ($id != null) {
                $this->design_id = $id;
                $design = ArstonDesignOne::find($id);
                $this->estate_name = $design->estate_name;
                $this->estate_address = $design->estate_address;
                $this->agreement_and_undertaking = $design->agreement_and_undertaking;
                $this->modalTitle = "Update Estate Design";
            }else{
                $this->modalTitle = "Design One";
            }
            $this->showDesignOneModal = true;

        }

        public function updatedEstateName(){
             $this->validate([
                'estate_name' => ['required', 'string', 'unique:'.ArstonDesignOne::class]
                
                ],[
                    'estate_name.exists' => 'This estate has already be added the database!'
                ]);
        }


        public function saveDesignOne(){
           
            $this->validate([
                    'estate_name' => ['required', 'string', 'unique:'.ArstonDesignOne::class],
                    'estate_address' => ['required', 'string'],
                    'agreement_and_undertaking' => ['required', 'string']
            ]);
            
            $designOne = new ArstonDesignOne();
            $designOne->estate_name = $this->estate_name;
            $designOne->estate_address = $this->estate_address;
            $designOne->agreement_and_undertaking = $this->agreement_and_undertaking;
            $designOne->save();
            $this->showDesignOneModal = false;
            $this->dispatch('notify', "design created, now add the payment plan and FAQs");
        
            $this->reset(['estate_name', 'estate_address', 'agreement_and_undertaking']);

        }

        public function addFaqs(int $id){
            return redirect()->route('arston.form.one.faq', ['design' => $id]);
        }

        public function addPaymentPlan(int $id){
            return redirect()->route('arston.form.one.payment', ['design' => $id]);
        }

        
        public function Edit(int $id){
            return redirect()->route('arston.form.one.edit', ['design_id' => $id]);
        }


    
        public function render()
        {
            if($this->selectAll) $this->selectPageRow();
            $designs = ArstonDesignOne::query()->get();
           
            return view('livewire.admin.generators.design-one',
                [
                    'designones'=> $this->rows,
                    'pdfs' => $designs
                ]);
        }
    
    
}
