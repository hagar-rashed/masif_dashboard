<?php

// app/Http/Controllers/Dashboard/QRCodeController.php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\QRCodeRequest;
use App\Models\QRCode as QRCodeModel; // Rename to avoid confusion
use Illuminate\Http\Request;
use QrCode; // Use the correct QrCode facade

class QRCodeController extends Controller
{
    public function index()
    {
        $qrcodes = QRCodeModel::all(); // Use QRCodeModel instead of QRCode
        return view('dashboard.qrcodes.index', compact('qrcodes'));
    }

    public function create()
    {
        return view('dashboard.qrcodes.create');   }

      

    // Create a new QR code record
    public function store(QRCodeRequest $request)
    {
    // Create a new QR code record
    $qrCode = new QRCodeModel($request->all()); // Ensure QRCodeModel is correctly used
    $qrCode->code = \Str::random(10); // Generate a unique code
    
    $qrCode->save();

    // Generate QR code image data
    $qrCodeImage = \QrCode::format('png')->size(300)->generate(route('admin.qrcodes.show', $qrCode->id));

    // Define the path to save the QR code image
    $qrPath = 'qrcodes/' . $qrCode->code . '.png';

    // Save the QR code image data to the public disk
    \Storage::disk('public')->put($qrPath, $qrCodeImage);

    // Save the QR code image path to the database
    $qrCode->qr_code = $qrPath;
    $qrCode->save();

    return redirect()->route('admin.qrcodes.index')->with('success', 'QR Code created successfully.');
    }
    
    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        $qrcode = QRCodeModel::findOrFail($id);
        return view('dashboard.qrcodes.edit', compact('qrcode'));
    }

    public function update(QRCodeRequest $request, $id)
    {
    // Fetch the existing QR code record
    $qrCode = QRCodeModel::findOrFail($id);

    // Update the QR code record with request data
    $qrCode->fill($request->all());

    // Handle file upload for photo if needed
    if ($request->hasFile('photo')) {
        // Delete the old photo if it exists
        if ($qrCode->photo) {
            \Storage::disk('public')->delete($qrCode->photo);
        }

        // Store the new photo
        $path = $request->file('photo')->store('photos', 'public');
        $qrCode->photo = $path;
    }

    // Save the updated QR code record to the database
    $qrCode->save();

    // Generate QR code image data
    $qrCodeImage = \QrCode::format('png')->size(300)->generate(route('admin.qrcodes.show', $qrCode->id));

    // Define the path to save the QR code image
    $qrPath = 'qrcodes/' . $qrCode->code . '.png';

    // Save the QR code image data to the public disk
    \Storage::disk('public')->put($qrPath, $qrCodeImage);

    // Save the QR code image path to the database
    $qrCode->qr_code = $qrPath;
    $qrCode->save();

    // Redirect to the QR codes index page with success message
    return redirect()->route('admin.qrcodes.index')->with('success', 'QR Code updated successfully.');
}

    public function destroy($id)
    {
        // $qrcode->delete();
        QRCodeModel::where('id',$id)->delete();
        
        return redirect()->route('admin.qrcodes.index')->with('success', 'QR Code deleted successfully.');
    }
}
