<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

// ========== TEST ROUTES - TAMBAHKAN INI ==========

// Test Session & CSRF
Route::get('/test-session', function() {
    echo "<h1>🛠️ TEST SESSION & CSRF</h1>";
    
    // Test write session
    session(['test_key' => 'test_value_' . time()]);
    
    // Test read session
    $value = session('test_key', 'NOT SET');
    
    // Test CSRF token
    $token = csrf_token();
    
    echo "Session working: " . ($value !== 'NOT SET' ? '✅ YES' : '❌ NO') . "<br>";
    echo "Session value: " . $value . "<br>";
    echo "CSRF token: " . ($token ? '✅ OK' : '❌ MISSING') . "<br>";
    echo "Session driver: " . config('session.driver') . "<br>";
    echo "APP_DEBUG: " . (config('app.debug') ? '✅ TRUE' : '❌ FALSE') . "<br>";
    
    // Test storage write
    $testFile = storage_path('test_write.txt');
    file_put_contents($testFile, 'Test write: ' . date('H:i:s'));
    echo "Storage write: " . (file_exists($testFile) ? '✅ OK' : '❌ FAILED') . "<br>";
    
    return "<hr><a href='/test-email-now'>Next: Test Email</a>";
});

// Test Email Simple
Route::get('/test-email-now', function() {
    echo "<h1>📧 TEST EMAIL SEDERHANA</h1>";
    
    try {
        \Illuminate\Support\Facades\Mail::raw('Test email ' . date('H:i:s'), function($message) {
            $message->to('jonathan.pasaribu17@gmail.com')
                    ->subject('TEST EMAIL - ' . date('H:i:s'))
                    ->from('jonathan.pasaribu12r@gmail.com', 'PPDB TEST');
        });
        
        echo "<p style='color:green;'>✅ Email berhasil dikirim! Cek Gmail Anda.</p>";
        
    } catch (\Exception $e) {
        echo "<p style='color:red;'>❌ ERROR: " . $e->getMessage() . "</p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    }
    
    return "<hr><a href='/test-form-post'>Next: Test Form POST</a>";
});

// Test Form POST
Route::get('/test-form-post', function() {
    echo "<h1>📝 TEST FORM POST</h1>";
    echo "<form method='POST' action='/test-form-process'>";
    echo csrf_field();
    echo "<input type='text' name='subject' value='Test Subject'><br>";
    echo "<textarea name='message'>Test message</textarea><br>";
    echo "<button type='submit'>Test Submit</button>";
    echo "</form>";
});

Route::post('/test-form-process', function(\Illuminate\Http\Request $request) {
    echo "<h1>📨 FORM SUBMIT RESULT</h1>";
    echo "Subject: " . $request->subject . "<br>";
    echo "Message: " . $request->message . "<br>";
    echo "CSRF Valid: " . ($request->has('_token') ? '✅ YES' : '❌ NO') . "<br>";
    echo "User: " . (auth()->check() ? auth()->user()->email : 'GUEST') . "<br>";
    
    return "<hr><a href='/test-session'>Back to Session Test</a>";
});

// Test Student Contact Route
Route::get('/test-contact-route', function() {
    echo "<h1>📍 TEST CONTACT ROUTE</h1>";
    
    // Cek route student.contact
    $route = route('student.contact');
    echo "Route student.contact: <a href='$route'>$route</a><br>";
    
    // Cek route student.sendContactMessage
    try {
        $sendRoute = route('student.sendContactMessage');
        echo "Route student.sendContactMessage: $sendRoute<br>";
    } catch (\Exception $e) {
        echo "Route student.sendContactMessage: ❌ NOT FOUND<br>";
    }
    
    // Test controller method exists
    if (method_exists(App\Http\Controllers\StudentController::class, 'sendMessage')) {
        echo "Controller method sendMessage: ✅ EXISTS<br>";
    } else {
        echo "Controller method sendMessage: ❌ MISSING<br>";
    }
    
    return "<hr><a href='$route'>Go to Contact Page</a>";
});

// ========== END TEST ROUTES ==========

// ========== ROUTES UNTUK CHECK & FIX ==========

// Check email folder structure
Route::get('/check-email-folder', function() {
    $path = resource_path('views/emails/contact.blade.php');
    $exists = file_exists($path);
    
    if ($exists) {
        $content = file_get_contents($path);
        return "<h3 style='color:green;'>✅ File exists!</h3>
                <p>Path: $path</p>
                <pre>" . htmlspecialchars(substr($content, 0, 500)) . "</pre>
                <p><a href='/test-email-fix'>Test Email</a></p>";
    } else {
        // Coba buat folder dan file
        $folderPath = resource_path('views/emails');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }
        
        $template = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan dari Calon Siswa PPDB</title>
</head>
<body>
    <h2>SMAN 1 PANGARIBUAN</h2>
    <p>Portal PPDB Digital</p>
    
    <hr>
    
    <h3>Pesan Baru dari Calon Siswa</h3>
    
    <p><strong>Nama:</strong> {{ $name ?? "N/A" }}</p>
    <p><strong>Email:</strong> {{ $email ?? "N/A" }}</p>
    <p><strong>Subjek:</strong> {{ $subject ?? "N/A" }}</p>
    <p><strong>Waktu:</strong> {{ $time ?? "N/A" }}</p>
    
    <hr>
    
    <h4>Isi Pesan:</h4>
    <div style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
        {{ $message ?? "Tidak ada pesan" }}
    </div>
    
    <hr>
    
    <p><small>Email ini dikirim otomatis dari sistem PPDB SMAN 1 Pangaribuan.</small></p>
    <p><small>Balas ke: {{ $email ?? "N/A" }}</small></p>
</body>
</html>';
        
        file_put_contents($path, $template);
        
        return "<h3 style='color:orange;'>⚠️ File was created!</h3>
                <p>Path: $path</p>
                <p>Folder and file created automatically.</p>
                <p><a href='/check-email-folder'>Refresh to check</a></p>";
    }
});

// Test email fix
Route::get('/test-email-fix', function() {
    try {
        // Data sederhana untuk test
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Test Fix',
            'message' => 'Ini pesan test untuk fixing email system',
            'time' => date('d-m-Y H:i:s')
        ];
        
        // Cek apakah view file ada
        $viewPath = resource_path('views/emails/contact.blade.php');
        echo "<h3>Checking Email Template</h3>";
        echo "View path: " . $viewPath . "<br>";
        echo "File exists: " . (file_exists($viewPath) ? '✅ YES' : '❌ NO') . "<br><br>";
        
        if (!file_exists($viewPath)) {
            return "<p style='color:red;'>Template file not found! <a href='/check-email-folder'>Create it first</a></p>";
        }
        
        // Test render view
        echo "<h3>Testing View Render</h3>";
        try {
            $view = view('emails.contact', $data)->render();
            echo "<div style='border:1px solid green; padding:10px; background:#f9f9f9;'>" . htmlspecialchars($view) . "</div>";
            echo "<p style='color:green;'>✅ View rendered successfully!</p>";
        } catch (\Exception $e) {
            echo "<p style='color:red;'>❌ View render error: " . $e->getMessage() . "</p>";
            return;
        }
        
        echo "<br><h3>Testing Email Send</h3>";
        // Test send email
        \Illuminate\Support\Facades\Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('jonathan.pasaribu12r@gmail.com')
                    ->subject('[FIX TEST] ' . $data['subject'])
                    ->replyTo($data['email']);
        });
        
        echo "<p style='color:green;'>✅ Email sent successfully to jonathan.pasaribu12r@gmail.com!</p>";
        echo "<p>Check your email inbox.</p>";
        
    } catch (\Exception $e) {
        echo "<h3 style='color:red;'>❌ Error</h3>";
        echo "<p>" . $e->getMessage() . "</p>";
        echo "<pre>Trace: " . $e->getTraceAsString() . "</pre>";
    }
});

// Create folder and file automatically
Route::get('/create-email-template', function() {
    $folder = resource_path('views/emails');
    $file = $folder . '/contact.blade.php';
    
    // Create folder
    if (!file_exists($folder)) {
        mkdir($folder, 0755, true);
    }
    
    // Create file
    $template = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan dari Calon Siswa PPDB</title>
</head>
<body>
    <h2>SMAN 1 PANGARIBUAN</h2>
    <p>Portal PPDB Digital</p>
    
    <hr>
    
    <h3>Pesan Baru dari Calon Siswa</h3>
    
    <p><strong>Nama:</strong> {{ $name ?? "N/A" }}</p>
    <p><strong>Email:</strong> {{ $email ?? "N/A" }}</p>
    <p><strong>Subjek:</strong> {{ $subject ?? "N/A" }}</p>
    <p><strong>Waktu:</strong> {{ $time ?? "N/A" }}</p>
    
    <hr>
    
    <h4>Isi Pesan:</h4>
    <div style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
        {{ $message ?? "Tidak ada pesan" }}
    </div>
    
    <hr>
    
    <p><small>Email ini dikirim otomatis dari sistem PPDB SMAN 1 Pangaribuan.</small></p>
    <p><small>Balas ke: {{ $email ?? "N/A" }}</small></p>
</body>
</html>';
    
    file_put_contents($file, $template);
    
    return "<h3 style='color:green;'>✅ Email template created!</h3>
            <p>File: $file</p>
            <p><a href='/test-email-fix'>Test Email</a></p>";
});

// --- PUBLIC ROUTES (Halaman Depan) ---
Route::get('/', function () {
    try {
        $settings = Setting::pluck('value', 'key')->toArray();
    } catch (\Exception $e) {
        $settings = [];
    }
    return view('welcome', compact('settings'));
});

// --- AUTHENTICATION ROUTES ---
require __DIR__.'/auth.php';

// --- PROTECTED ROUTES (Hanya untuk User yang Login) ---
Route::middleware('auth')->group(function () {

    // 1. SMART REDIRECT DASHBOARD
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('student.dashboard');
    })->name('dashboard');

    // 2. ROUTES UNTUK FORMULIR
    Route::resource('registrations', RegistrationController::class);

    // 3. ROUTES KHUSUS SISWA
    Route::prefix('student')->name('student.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
        
        // Formulir
        Route::get('/registration', [StudentController::class, 'registration'])->name('registration');
        
        // Halaman Informasi Lainnya
        Route::get('/results', [StudentController::class, 'results'])->name('results');
        Route::get('/info', [StudentController::class, 'info'])->name('info');
        Route::get('/contact', [StudentController::class, 'contact'])->name('contact');
        
        // ⚠️ ROUTE KIRIM PESAN - PERBAIKI INI!
        Route::post('/contact/send', [StudentController::class, 'sendMessage'])
            ->name('sendContactMessage')
            ->middleware('auth');
        
        // --- PENGATURAN PROFIL SISWA ---
        Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
        Route::put('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
        
        Route::delete('/account', [StudentController::class, 'deleteAccount'])->name('account.delete');

        // Route Cetak Kartu
        Route::get('/cetak-kartu', [StudentController::class, 'printCard'])->name('print.card');
    });

    // 4. ROUTES KHUSUS ADMIN
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/students', [AdminController::class, 'students'])->name('students'); 
        Route::get('/students/export', [AdminController::class, 'exportExcel'])->name('students.export');
        
        Route::get('/registration/{id}', [AdminController::class, 'show'])->name('show');
        Route::put('/registration/{id}/status', [AdminController::class, 'updateStatus'])->name('updateStatus');

        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
        
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        
        Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    });

});

// --- RUTE PERBAIKAN SISTEM ---
Route::get('/fix-app', function() {
    try {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    } catch (\Exception $e) {}

    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'photo_url')) $table->string('photo_url')->nullable();
        if (!Schema::hasColumn('users', 'phone')) $table->string('phone')->nullable();
        if (!Schema::hasColumn('users', 'birth_date')) $table->date('birth_date')->nullable();
        if (!Schema::hasColumn('users', 'address')) $table->text('address')->nullable();
    });

    return "<div style='font-family:sans-serif; text-align:center; padding:50px; background:#e0f2f1;'>
                <h1 style='color:#00695c;'>✅ SYSTEM FIXED!</h1>
                <p>Cache telah dibersihkan.</p>
                <p>Test Email System:</p>
                <p>
                    <a href='/create-email-template' style='margin:5px; padding:10px 15px; background:#009688; color:white; text-decoration:none; border-radius:5px;'>1. Create Template</a>
                    <a href='/check-email-folder' style='margin:5px; padding:10px 15px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;'>2. Check Template</a>
                    <a href='/test-email-fix' style='margin:5px; padding:10px 15px; background:#2196F3; color:white; text-decoration:none; border-radius:5px;'>3. Test Email</a>
                </p>
                <a href='/student/dashboard' style='background:#009688; color:white; padding:15px 30px; text-decoration:none; border-radius:5px; font-weight:bold; margin-top:20px; display:inline-block;'>Kembali ke Dashboard</a>
            </div>";
});