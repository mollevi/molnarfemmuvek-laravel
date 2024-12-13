<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('news', 'news');
        $this->crud->orderBy('updated_at', 'desc');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setValidation(NewsRequest::class);
        // Columns setup for listing view
        $this->crud->addColumn([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title'
        ]);

        $this->crud->addColumn([
            'name' => 'subtitle',
            'type' => 'text',
            'label' => 'Subtitle'
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'date',
            'label' => 'Created at'
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'date',
            'label' => 'Updated at'
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
        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title"
        ]);

        $this->crud->addField([
            'name' => 'subtitle',
            'type' => 'text',
            'label' => "Subtitle"
        ]);

        $this->crud->addField([
            'name' => 'teaser',
            'type' => 'textarea',
            'label' => "Teaser"
        ]);

        $this->crud->addField([
            'name' => 'content',
            'type' => 'summernote',
            'label' => "Content"
        ]);

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
            'disk' => 'public',
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
}
