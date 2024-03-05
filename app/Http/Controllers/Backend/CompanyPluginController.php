<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CompanyPlugin;
use App\Models\Plugin;
use Illuminate\Http\Request;

class CompanyPluginController extends Controller
{
    public function plugin()
    {
        $plugins = Plugin::with(['companyPlugins' => function ($q) {
            $q->where('company_id', auth()->user()->id);
        }])->where('status', 1)->get();

        return view('company.plugin.index', compact('plugins'));
    }

    public function pluginActivate(Request $request)
    {

        $pluginactivate = CompanyPlugin::create([
            'plugin_id' => $request->plugin_id,
            'company_id' => $request->company_id,
            'status' => 1,
        ]);
        toastr('Activated Successfully');
        return redirect()->back();
    }

    public function pluginDeactivate(string $id)
    {
        $plugindeactivate = CompanyPlugin::findOrFail($id);
        $plugindeactivate->delete();
        toastr('Plugin Deactivate Successfully');
        return redirect()->back();
    }
}
