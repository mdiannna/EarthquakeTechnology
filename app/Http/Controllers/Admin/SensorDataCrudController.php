<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SensorDataRequest as StoreRequest;
use App\Http\Requests\SensorDataRequest as UpdateRequest;

/**
 * Class Sensor_dataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SensorDataCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\SensorData');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/sensor-data');
        $this->crud->setEntityNameStrings('sensor_data', 'sensor_data');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

         $this->crud->addColumn([
            'name'  => 'sensor_id',
            'label' => 'Sensor id',
            'type'  => 'text', 
        ]);



        $this->crud->addColumn([
    'label' => "Sensor", 
   'type' => "select",
   'name' => 'sensor', 
   'entity' => 'sensor', 
   'attribute' => "name", 
   'model' => "App\Models\Sensor",
        ]);


        $this->crud->addColumn([
            'name'  => 'val1',
            'label' => 'Value 1',
            'type'  => 'text', 
        ]);

        $this->crud->addColumn([
            'name'  => 'val2',
            'label' => 'Value 2',
            'type'  => 'text', 
        ]);

        $this->crud->addColumn([
            'name'  => 'val3',
            'label' => 'Value 3',
            'type'  => 'text', 
        ]);

        $this->crud->addColumn([
            'name'  => 'other_data',
            'label' => 'Other data',
            'type'  => 'text', 
        ]);


        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in Sensor_dataRequest
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
