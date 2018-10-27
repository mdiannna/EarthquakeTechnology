<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SensorRequest as StoreRequest;
use App\Http\Requests\SensorRequest as UpdateRequest;

/**
 * Class SensorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SensorCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Sensor');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/sensor');
        $this->crud->setEntityNameStrings('sensor', 'sensors');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'name'  => 'id',
            'label' => 'Sensor id',
            'type'  => 'text', 
        ]);

        $this->crud->addColumn([
            'name'  => 'name',
            'label' => 'Sensor name',
            'type'  => 'text', 
        ]);

        $this->crud->addColumn([
            'name'  => 'additional_details',
            'label' => 'Addditional details',
            'type'  => 'textarea', 
        ]);
        

        $this->crud->addColumn([
            'name'  => 'active',
            'label' => 'Active',
            // 'type'  => 't', 
        ]);

        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Sensor name',
            'type'  => 'text', 
        ]);

        $this->crud->addField([
            'name'  => 'additional_details',
            'label' => 'Addditional details',
            'type'  => 'textarea', 
        ]);
        

        $this->crud->addField([
            'name'  => 'active',
            'label' => 'Active',
            'type'  => 'checkbox', 
        ]);
        

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in SensorRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
