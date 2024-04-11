<?php
namespace App\Livewire\Admin\Generators\DesignOneComponents;

use App\Models\ArstonDesignOne;
use App\Models\ArstonDesignOneFAQ;
use Livewire\Component;
use App\Traits\WithRealPage;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use App\Traits\Datatable\WithSorting;
use App\Traits\Datatable\WithCachedRows;
use App\Traits\Datatable\WithBulkActions;
use App\Traits\Datatable\WithPerPagePagination;

#[Layout('layouts.app')]
class FAQ extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows, WithRealPage;
    #region properties
        public bool $showDeleteModal = false;
        //post details
        public $fqa_id;
        public $design;
        //end of post details
        public string $modalTitle = '';
        public bool $showModelError = false; //use this method to hide inputs
        public bool $showFilters = false;
        public bool $showDesignOneFAQModal = false;
        public array $filters = [
            'search' => '',
            'filter-date-start' => null,
            'filter-date-end' => null,
        ];
        public string $msg = '';
        public string $question;
        public string $answer;
    #endregion
        protected $listeners = ['refreshTransactions' => '$refresh'];
        protected $queryString = ['design'];
    
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
            $this->selectedRowsQuery->delete();
        }
        public function deleteSelected(): void
        {
            $this->deletedSelected();
            $this->selectAll = false;
            $this->selectPage = false;
            $this->showDeleteModal = false;
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
            $query = ArstonDesignOneFAQ::query()
                ->when($this->filters['filter-date-start'], fn($query, $date) => $query->where('created_at','>=', Carbon::parse($date)))
                ->when($this->filters['filter-date-end'], fn($query, $date) => $query->where('created_at','<=', Carbon::parse($date)))
                ->when($this->filters['search'], fn($query, $search) => $query->where('question','like', '%'.$search.'%'));
    //         
    
            return $this->applySorting($query);
        }
        public function getRowsProperty(){
            return  $this->grabCache( function () {
                return $this->applyPagination($this->rowsQuery);
            });
        }

        public function addFaqs(){
            $this->showDesignOneFAQModal = true;
            $this->modalTitle = "FAQ";
        }

        public function saveDesignOneFAQ(){
            
            if($this->fqa_id != null)
            {
                ArstonDesignOneFAQ::where('id', $this->fqa_id)->update([
                            'question' => $this->question,
                            'answer' => $this->answer
                ]);
                $this->msg = "Question and Answer updated";
                $this->dispatch('question-saved');
                $this->showDesignOneFAQModal = false;

            }else{
                $this->validate([
                    'question' => ['required', 'unique:'.ArstonDesignOneFAQ::class]
                ]);
                $faq = new ArstonDesignOneFAQ();
                $faq->question = $this->question;
                $faq->answer = $this->answer;
                $faq->design_id = $this->design;
                $this->msg = "Question and Answer created, add more or close the modal";
                $this->dispatch('question-saved');
                $faq->save();

                
            }
            $this->reset(['question', 'answer']);
        }

        public function Update(int $id){
            $this->fqa_id = $id;
            $faq = ArstonDesignOneFAQ::find($id);
            $this->question = $faq->question;
            $this->answer = $faq->answer;
            $this->showDesignOneFAQModal = true;
            $this->modalTitle = "Update FAQ";
            
        }

        public function render()
        {
            if($this->selectAll) $this->selectPageRow();
    
            return view('livewire.generators.design-one-components.f-a-q',
                [
                    'faqs'=> $this->rows
                ]);
        }
    
    
}
