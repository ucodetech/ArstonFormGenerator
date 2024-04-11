<?php
namespace App\Livewire\Admin\Generators\DesignOneComponents;

use App\Models\ArstonDesignOne;
use App\Models\ArstonDesignOnepayment;
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
class PaymentPlan extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows, WithRealPage;
    #region properties
        public bool $showDeleteModal = false;
        //post details
        public $payment_id;
        public $design;
        //end of post details
        public string $modalTitle = '';
        public bool $showModelError = false; //use this method to hide inputs
        public bool $showFilters = false;
        public bool $showDesignOnePPModal = false;
        public array $filters = [
            'search' => '',
            'filter-date-start' => null,
            'filter-date-end' => null,
        ];
        public string $msg = '';
        public string $duration;
        public string $amount;
        public string $payment_sqm;
        public $list_sqms = [];

    #endregion
        protected $listeners = ['refreshTransactions' => '$refresh'];
        protected $queryString = ['design'];
    
        public function mount(){
            $this->cloneMount();
            $this->realPage = $this->grabPage();
    
        }
        protected function cloneMount()
        {
            $this->list_sqms = [
                    '100sqm' => '100sqm',
                    '300sqm' => '300sqm',
                    '500sqm' => '500SQM',
                    '600sqm' => '600SQM'
            ];
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
                echo ArstonDesignOnePaymentPlan::whereKey($this->selected)->toCsv();
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
            $query = ArstonDesignOnePaymentPlan::query()
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

        public function addpayments(){
            $this->showDesignOnePPModal = true;
            $this->modalTitle = "Payment Plan";
        }

        public function saveDesignOnePaymentPlan(){
            
            if($this->payment_id != null)
            {
                ArstonDesignOnePaymentPlan::where('id', $this->payment_id)->update([
                            'duration' => $this->duration,
                            'amount' => $this->amount,
                            'sqm' => $this->payment_sqm
                ]);
                $this->msg = "payment updated";
                $this->dispatch('payment-saved');
                $this->showDesignOnePPModal = false;

            }else{
                $this->validate([
                    'duration' => ['required', 'unique:'.ArstonDesignOnePaymentPlan::class],
                    'amount' => ['required', 'unique:'.ArstonDesignOnePaymentPlan::class]

                ]);
                $payment = new ArstonDesignOnePaymentPlan();
                $payment->duration = $this->duration;
                $payment->amount = $this->amount;
                $payment->sqm = $this->payment_sqm;
                $payment->design_id = $this->design;
                $this->msg = "payment created, add more or close the modal";
                $this->dispatch('payment-saved');
                $payment->save();

                
            }

            $this->reset(['duration', 'amount', 'payment_sqm']);
        }

        public function Update(int $id){
            $this->payment_id = $id;
            $payment = ArstonDesignOnePaymentPlan::find($id);
            $this->duration = $payment->duration;
            $this->amount = $payment->amount;
            $this->payment_sqm = $payment->sqm;
            $this->showDesignOnePPModal = true;
            $this->modalTitle = "Update payment plan";
            
        }

        public function render()
        {
            if($this->selectAll) $this->selectPageRow();
    
            return view('livewire.generators.design-one-components.payment-plan',
                [
                    'payments'=> $this->rows
                ]);
        }
    
    
}
