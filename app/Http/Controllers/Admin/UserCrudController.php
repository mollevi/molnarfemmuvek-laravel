<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * https://backpackforlaravel.com/docs/6.x/crud-operations
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');

        CRUD::addColumn([
            'name' => 'id', // The db column name
            'label' => 'ID', // Table column heading
            'type' => 'text', // Type of the column
        ]);

        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
        ]);

        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        CRUD::addColumn([
            'name' => 'is_verified',
            'label' => 'Is Verified',
            'type' => 'check',
            'options' => [0 => 'No', 1 => 'Yes'],
            'orderable' => false,
            'searchLogic' => false,
            'visibleInTable' => true,
            'visibleInExport' => true,
            'visibleInShow' => true,
            'wrapper' => [
                'element' => 'span',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return '';
                },
                'class' => function ($crud, $column, $entry, $related_key) {
                    return $entry->email_verified_at ? 'badge badge-success' : 'badge badge-default';
                },
                'append' => function ($crud, $column, $entry, $related_key) {
                    return $entry->email_verified_at ? 'Verified' : 'Not Verified';
                }
            ],
        ]);

        CRUD::addColumn([
            'name' => 'is_admin',
            'label' => 'Administrator',
            'type' => 'boolean',
            // Optionally, specify a format
            'options' => [0 => 'No', 1 => 'Yes']
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'label' => 'Created At',
            'type' => 'datetime',
        ]);

        CRUD::addColumn([
            'name' => 'updated_at',
            'label' => 'Updated At',
            'type' => 'datetime',
        ]);

        CRUD::addColumn([
            'name' => 'Alive',
            'label' => 'Alive',
            'type' => 'check',
            'options' => [0 => 'No', 1 => 'Yes'],
            'orderable' => false,
            'searchLogic' => false,
            'visibleInTable' => true,
            'visibleInExport' => true,
            'visibleInShow' => true,
            // Define how to determine if the email is verified
            'wrapper' => [
                'element' => 'span',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return ''; // no link needed
                },
                'class' => function ($crud, $column, $entry, $related_key) {
                    return $entry->deleted_at ? 'badge badge-default' : 'badge badge-success';
                },
                'append' => function ($crud, $column, $entry, $related_key) {
                    return $entry->deleted_at ? 'Deleted' : 'Not deleted';
                }
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        CRUD::setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
