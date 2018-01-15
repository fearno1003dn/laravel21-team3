<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\CheckServiceEditRequest;
use Illuminate\Pagination\Paginator;

class ServiceController extends Controller
{

    public function listAllService()
    {

        $services = Service::all();
        return view('admins.services.listAllServices',compact('services'));

    }

    public function createService(Service $service)
    {
        return view('admins.services.create',compact('service'));
    }

    public function editService(Service $service)
    {

        return view('admins.services.edit',compact('service'));
    }

    public function saveService(ServiceRequest $request)
    {
        $inputs = $request->all();
        $service = Service::create($inputs);
        return redirect('admins/services')->withSuccess('Success');
    }

    public function updateService(Service $service, CheckServiceEditRequest $request)
    {
        $inputs = $request->all();
        $service->update($inputs);
        return redirect('/admins/services')->withSuccess('Update service success');
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        return redirect('admins/services')->withSuccess('Service has been delete');
    }

    public function serviceDetail(Service $service)
    {
        return view('admins.services.serviceDetail', compact('service'));
    }

    public function searchService()
   {
         $search = Input::get('search');

         $services = Service::where('name', 'LIKE', '%'. $search.'%')
         ->Orwhere('price','=',$search)
         ->Orwhere('description','LIKE','%'.$search.'%')
         ->paginate(1);

          return view('admins.services.listAllSearchService',compact('services'));
   }
}
