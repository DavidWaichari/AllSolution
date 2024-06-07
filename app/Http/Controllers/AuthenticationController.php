<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{

    public function registerForm()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        // Create a new user instance
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Use bcrypt to hash the password
        ]);

        // Save the user to the database
        $user->save();

        // Return a response indicating successful registration
        return redirect('/login');
    }
    public function loginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:4',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful
            return redirect()->intended('/choose_company'); // Redirect to the intended page or dashboard
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
        }
    }

    public function chooseCompanyForm()
    {
        // Get the current logged in user
        $user = Auth::user();

        // Get the companies associated with the current logged in user
        $companies = $user->companies;
        $subscriptions = Subscription::all();
        // Return the choose company form view
        return view('auth/choose_company', compact('companies','subscriptions'));
    }

    public function chooseCompanySave(Request $request)
    {
        // Retrieve the selected company ID from the request
        $companyId = $request->input('company_id');
        $url = $request->subscription_url;
        // Get the current authenticated user
        $user = Auth::user();
    
        // Update the current logged-in company ID for the user
        $user->current_logged_in_company = $companyId;
        $user->save();
    
        // Redirect the user to the desired page after selecting the company
        return redirect($url.'/dashboard');
    }

    public function ajaxCompanySubscriptions($company_id)
    {
        $company = Company::find($company_id);
        return $company->subscriptions;
    }
    
}
