<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Addresses;
use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function showProfile(Request $request)
    {// Jika belum login, redirect ke halaman login.
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }
    // Ambil data orders, wishlist, dan addresses milik user
    $orders = $user->orders()->latest()->get();
    $wishlist = Wishlist::where('user_id', $user->id)->get();
    $addresses = Addresses::where('user_id', $user->id)->get();
    $returns = OrderReturn::where('user_id', $user->id)->with('order')->latest()->get();
    return view('user-profile', [
        'user' => $user,
        'orders' => $orders,
        'wishlist' => $wishlist,
        'addresses' => $addresses,
        'returns' => $returns,
    ]);}

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
        return redirect()->route('login');
        }

        $validated = $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'phone_number' => 'nullable|string|max:20',
        ]);
        // Update data user
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->phone_number = $validated['phone_number'] ?? null;
        $user->save();
        return redirect()->route('user-profile', ['tab' => 'profile'])->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
        return redirect()->route('login');
        }
        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

    $user->password = Hash::make($validated['password']);
    $user->save();
    
    return redirect()->route('user-profile', ['tab' => 'password'])->with('success', 'Password updated successfully!');
    }

    public function UserProfileAddressesAdd(Request $request)
    {
        $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }

    // Validasi input
    $validator = Validator::make($request->all(), [
        'address_name' => 'required|string|max:100',
        'full_address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'province' => 'required|string|max:100',
        'postal_code' => 'required|string|max:20',
        'is_default' => 'nullable|boolean',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Jika set as default, unset default address lain
    if ($request->has('is_default')) {
        Addresses::where('user_id', $user->id)->update(['is_default' => false]);
    }

    // Simpan alamat baru
    Addresses::create([
        'user_id' => $user->id,
        'address_name' => $request->address_name,
        'full_address' => $request->full_address,
        'city' => $request->city,
        'province' => $request->province,
        'postal_code' => $request->postal_code,
        'is_default' => $request->has('is_default'),
    ]);

    return redirect()->route('user-profile')->with('success', 'Alamat berhasil ditambahkan!');
    }

    public function UserProfileAddresses(Request $request)
    {
        $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }
    $address = Addresses::where('user_id', $user->id)->findOrFail($id);
    $data = $request->validate([
        'address_name' => 'required|string|max:100',
        'full_address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'province' => 'required|string|max:100',
        'postal_code' => 'required|string|max:20',
        'is_default' => 'nullable|boolean',
    ]);
    if ($request->has('is_default')) {
        Addresses::where('user_id', $user->id)->update(['is_default' => false]);
        $data['is_default'] = true;
    } else {
        $data['is_default'] = false;
    }
    $address->update($data);
    return redirect()->route('user-profile', ['tab' => 'addresses'])->with('success', 'Alamat berhasil diupdate!');
    }

    public function deleteAddress($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $address = Addresses::where('user_id', $user->id)->findOrFail($id);
        $address->delete();
        return redirect()->route('user-profile', ['tab' => 'addresses'])->with('success', 'Alamat berhasil dihapus!');
    }


}
