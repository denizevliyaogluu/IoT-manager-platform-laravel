<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Devices;

class DevicesController extends Controller
{

    public function index()
    {
        $devices = Devices::all();
        return view('devices', compact('devices'));
    }

    public function show($uniqid)
    {
        $device = Devices::where('uniqid', $uniqid)->first();
        if ($device) {
            return view('admin.devices.show', compact('device'));
        }
        return redirect()->route('admin.devices.index')->with('error', 'Device not found.');
    }

    public function create()
    {
        return view('admin.devices.create');
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $device = new Devices();
        $device->uniqid = Str::random(64);
        $device->name = $request->name;
        $device->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload/devices'), $imageName);

            if ($device->image && file_exists(public_path($device->image))) {
                unlink(public_path($device->image));
            }

            $device->image = 'upload/devices/' . $imageName;
        }
        $device->save();

        return redirect()->back();
    }

    public function update($uniqid)
    {
        $device = Devices::where('uniqid', $uniqid)->first();
        if ($device) {
            return view('admin.devices.update', compact('device'));
        }
        return redirect()->back();
    }

    public function updatePost(Request $request, $uniqid)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $device = Devices::where('uniqid', $uniqid)->first();
        if ($device) {
            $device->name = $request->name;
            $device->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/devices'), $imageName);

                if ($device->image && file_exists(public_path($device->image))) {
                    unlink(public_path($device->image));
                }

                $device->image = 'upload/devices/' . $imageName;
            }
            $device->save();

            return redirect()->back();
        }
        return redirect()->back();
    }


    public function delete($uniqid)
    {
        $device = Devices::where('uniqid', $uniqid)->first();
        if ($device) {
            $device->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function showDeviceData($uniqid)
    {
        $device = Devices::where('uniqid', $uniqid)->first();
        if ($device) {
            $data = $device->deviceData()->get();
            return view('device_data', compact('device', 'data'));
        }
        return redirect()->back();
    }

    public function apiDeviceData($uniqid)
    {
        $device = Devices::where('uniqid', $uniqid)->first();
        if ($device) {
            $data = $device->deviceData;
            return response()->json($data);
        }
        return response()->json(['error' => 'Device not found.'], 404);
    }

    public function data()
    {
        $devices = Devices::all();
        return view('data', compact('devices'));
    }
}
