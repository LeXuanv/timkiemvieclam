<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

class CompanyController extends Controller
{
    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $path = $file->store('logos', 'public');

            $company = Company::find(auth()->user()->company_id);
            if ($company) {
                $company->logo = $path;
                $company->save();
            }

            return response()->json(['message' => 'Logo uploaded successfully!', 'path' => $path]);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }
}