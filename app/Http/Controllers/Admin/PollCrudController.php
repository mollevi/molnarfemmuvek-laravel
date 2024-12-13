<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PollRequest;
use App\Models\AnswerOption;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PollCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PollCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Poll::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/poll');
        CRUD::setEntityNameStrings('poll', 'polls');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('top', 'filter_deleted', 'filter_deleted', 'beginning');
        $trashed = request()->input('trashed', 0);
        if ($trashed == 1) {
            $this->crud->query = $this->crud->query->withTrashed();
        } elseif ($trashed == 2) {
            $this->crud->query = $this->crud->query->onlyTrashed();
        }

        $this->crud->addColumns([ // addColumns is alias to setColumns
            [
                'name'  => 'title',
                'label' => 'Title',
                'type'  => 'text',
            ],
            [
                'name'  => 'question',
                'label' => 'Question',
                'type'  => 'text',
            ],
        ]);

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->crud->addColumns([ // addColumns is alias to setColumns
            [
                'name'  => 'title',
                'label' => 'Title',
                'type'  => 'text',
            ],
            [
                'name'  => 'question',
                'label' => 'Question',
                'type'  => 'text',
            ],
        ]);
        $this->crud->addColumn([
            'name' => 'small_image',
            'label' => 'Small Image',
            'type' => 'image',
            'disk'   => 'public',
            'height' => '250px',
            'width'  => '250px',
        ]);

        $this->crud->addColumn([
            'name' => 'large_image',
            'label' => 'Large Image',
            'type' => 'image',
            'disk'   => 'public',
            'height' => '250px',
            'width'  => '250px',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PollRequest::class);
        CRUD::setFromDb();

        $this->crud->addField([
            'name' => 'small_image',
            'label' => 'Small Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
        ]);

        $this->crud->addField([
            'name' => 'large_image',
            'label' => 'Large Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);

        $this->crud->addField([
            'name' => 'answer_options',
            'type' => 'answer_options',
            'label' => 'Answer Options'
        ]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function addAnswerOption($poll_id, $response)
    {
        $answerOption = new AnswerOption();
        $answerOption->response = $response;
        $answerOption->poll_id = $poll_id;
        $answerOption->save();

        return redirect()->back();
    }
}
