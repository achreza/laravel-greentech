<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\SystemStatus;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailPemberitahuan;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topics = Topic::all();

        //$submissionStatus = $request->session()->get('system.status_submission');
        $page = 'content';

        return view('presenter.submission', compact('topics', 'page'));
    }

    public function edit(Request $request, $id)
    {
        $user = $request->session()->get('user');

        $topics = Topic::all();

        $data = Submission::where('id_user', $user->id_user)
            ->where('id_abs_submission', $id)
            ->first();
        $page = 'content';

        return view('presenter.edit', compact('data', 'topics', 'user', 'page'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'file' => 'required|file',
        ]);

        $tanggal = now()->format('d/m/Y');
        $file = $request->file('file');
        $filename = $this->generateFileName($file);

        $submission = new Submission();
        $submission->id_topic = $request->input('topic');
        $submission->judul = $request->input('judul');
        $submission->abstrak = $request->input('abstrak');
        $submission->file_abs = $filename;
        $submission->submitted_at = $tanggal;
        $submission->id_status_abs = 1;
        $submission->id_user = $request->session()->get('user.id_user');
        $submission->save();

        $file->storeAs('uploads', $filename, 'public');
        // $nama = $request->session()->get('user.nama');
        // $judul =  $submission->judul;
        // $data = [
        //     'subject' => "[ICGT 2023] Abstract $judul Has Been Submitted",
        //     'isi' => "Dear $nama\n Thank you for registering your paper Entitled '$judul' to 2023 13th International Conference of Green Technology (ICGT 2023).\n You can see all your submissions and their status at https://gcms.uin-malang.ac.id/.\n\nRegards, Thank you and have a nice day.\n\nWarmest Regards Technical and Support Staff\n ICGT 2023",
        // ];

        // try {
        //     $email = $request->session()->get('user.email');
        //     Mail::to($email)->send(new EmailPemberitahuan($data));

        //     return redirect('/dashboard')->with('success', 'Submission added successfully.');
        // } catch (Exception $e) {
        //     return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        // }
        return redirect('/dashboard')->with('success', 'Submission added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $submission = Submission::find($id);
        $page = 'content';
        return view('presenter.detail', compact('submission', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'id_topic' => $request->input('topic'),
            'judul' => $request->input('judul'),
            'abstrak' => $request->input('abstrak'),
        ];


        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file',
            ]);

            $file = $request->file('file');
            $filename = $this->generateFileName($file);
            $data['file_abs'] = $filename;

            $file->storeAs('uploads', $filename);
        }

        Submission::where('id_abs_submission', $id)
            ->update($data);


        if ($request->hasFile('file')) {
            //             $email = $request->session()->get('user.email');
            //             $nama = $request->session()->get('user.nama');
            //             $judul = $data['judul'];
            //             $data = [
            //                 'subject' => "[ICGT 2023] Your Submission has been Changed",
            //                 'isi' => "
            //         Dear $nama \nInformation about your paper Entitled $judul for ICGT 2023 was changed. No further action is required from you. You have already submitted your manuscript, but you can change it at any time before the deadline. You can see all your submissions and their status at https://gcms.uin-malang.ac.id/.\n From there, you can see the current status of the paper, whether a manuscript has been submitted and can edit the abstract information.\n\nRegards,
            // Thank you and have a nice day.\n\nWarmest Regards
            // Technical and Support-Staff\n
            // ICGT-2023",
            //             ];
            //             Mail::to($email)->send(new EmailPemberitahuan($data));
            //             $request->session()->flash('success', 'Data updated successfully!');
            return redirect('/dashboard');
        } else {
            //             $email = $request->session()->get('user.email');
            //             $nama = $request->session()->get('user.nama');
            //             $judul = $data['judul'];
            //             $data = [
            //                 'subject' => "[ICGT 2023] Your Submission has been Changed",
            //                 'isi' => "
            //         Dear $nama \nInformation about your paper Entitled $judul for ICGT 2023 was changed. No further action is required from you. You have already submitted your manuscript, but you can change it at any time before the deadline. You can see all your submissions and their status at https://gcms.uin-malang.ac.id/.\n From there, you can see the current status of the paper, whether a manuscript has been submitted and can edit the abstract information.\n\nRegards,
            // Thank you and have a nice day.\n\nWarmest Regards
            // Technical and Support-Staff\n
            // ICGT-2023",
            //             ];
            //             Mail::to($email)->send(new EmailPemberitahuan($data));
            return redirect('/detail/' . $id)->with('success', 'Data updated successfully!');
        }
    }

    public function download($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/uploads/{$nama_file}");

        // Cek apakah file ada di direktori storage
        if (!file_exists($filePath)) {
            return redirect('/dashboard')->with('error', 'File not found.');
        }

        // Ambil nama file tanpa path
        $originalName = pathinfo($filePath, PATHINFO_FILENAME);

        // Dapatkan ekstensi file
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Mendefinisikan headers untuk response
        $headers = [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => "attachment; filename=\"{$originalName}.{$extension}\"",
        ];

        // Return response dengan file untuk di-download
        return response()->file($filePath, $headers);
    }
    public function paymentDownload($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/payment/{$nama_file}");

        // Cek apakah file ada di direktori storage
        if (!file_exists($filePath)) {
            return redirect('/dashboard')->with('error', 'File not found.');
        }

        // Ambil nama file tanpa path
        $originalName = pathinfo($filePath, PATHINFO_FILENAME);

        // Dapatkan ekstensi file
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Mendefinisikan headers untuk response
        $headers = [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => "attachment; filename=\"{$originalName}.{$extension}\"",
        ];

        // Return response dengan file untuk di-download
        return response()->file($filePath, $headers);
    }

    public function studentCardDownload($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/student-card/{$nama_file}");

        // Cek apakah file ada di direktori storage
        if (!file_exists($filePath)) {
            return redirect('/dashboard')->with('error', 'File not found.');
        }

        // Ambil nama file tanpa path
        $originalName = pathinfo($filePath, PATHINFO_FILENAME);

        // Dapatkan ekstensi file
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Mendefinisikan headers untuk response
        $headers = [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => "attachment; filename=\"{$originalName}.{$extension}\"",
        ];

        // Return response dengan file untuk di-download
        return response()->file($filePath, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::table('submission_abstrak')
            ->where('id_abs_submission', $id)
            ->delete();

        //         $request->session()->flash('success', 'Data removed: ' . $id);
        //         $email = $request->session()->get('user.email');
        //         $nama = $request->session()->get('user.nama');

        //         $data = [
        //             'subject' => "[ICGT 2023] Your Submission has been Deleted",
        //             'isi' => "
        //         Dear $nama \nInformation about your paper for ICGT 2023 was Deleted. No further action is required from you. You can see all your submissions and their status at https://gcms.uin-malang.ac.id/.\n From there, you can see the current status of the paper, whether a manuscript has been submitted and can edit the abstract information.\n\nRegards,
        // Thank you and have a nice day.\n\nWarmest Regards
        // Technical and Support-Staff\n
        // ICGT-2023",
        //         ];
        //         Mail::to($email)->send(new EmailPemberitahuan($data));
        return redirect('/dashboard');
    }
    public function decision(Request $request, $id)
    {
        $submission = Submission::find($id);
        $formattedDate = now()->format('d/m/Y');

        $submission->comment = $request->comment;
        $submission->id_status_abs = $request->status;
        $submission->decission_by = session('user.id_user');
        $submission->decission_at = $formattedDate;
        $submission->update();

        return redirect('/dashboard')->with('success', 'Decision added successfully.');
    }


    public function systemStatus(Request $request)
    {
        $request->validate([
            'system-status' => 'required',
            'payment' => 'required',
        ]);

        $system = SystemStatus::first();
        $status = $request->input('system-status');
        $payment = $request->input('payment');

        $system->status = $status;
        $system->payment = $payment;
        $system->update();

        return redirect('/dashboard')->with('success', 'System status updated successfully.');
    }

    public function payment(Request $request)
    {
        $id = $request->session()->get('user.id_user');
        $page = 'content';
        $data = Submission::where('id_user', $id)->where('id_status_abs', '2')->get();
        return view('presenter.payment', compact('page', 'data'));
    }

    public function paymentPage(Request $request, $id)
    {
        $page = 'content';
        $submission = Submission::find($id);
        return view('presenter.payment-page', compact('page', 'submission'));
    }
    public function paymentConfirmation(Request $request, $id)
    {
        $id = $id;
        $page = 'content';
        if ($request->onsiteEarly == 'onsiteEarlyUndergraduate') {
            $type = 'student';
            $conference = 'Onsite Early Undergraduate';
            $price = 'IDR 500.000';
        } else if ($request->onsiteEarly == 'onsiteEarlyPostgraduate') {
            $type = 'student';
            $conference = 'Onsite Early Postgraduate';
            $price = 'IDR 750.000';
        } else if ($request->onsiteRegular == 'onsiteRegularUndergraduate') {
            $type = 'student';
            $conference = 'Onsite Regular Undergraduate';
            $price = 'IDR 550.000';
        } else if ($request->onsiteEarly == 'onsiteRegularPostgraduate') {
            $type = 'student';
            $conference = 'Onsite Regular Postgraduate';
            $price = 'IDR 800.000';
        } else if ($request->onsiteEarly == 'onsiteEarlyLocal') {
            $type = 'Local';
            $conference = 'Onsite Early Local';
            $price = 'IDR 750.000';
        } else if ($request->onsiteEarly == 'onsiteEarlyInternational') {
            $type = 'International';
            $conference = 'Onsite Early International';
            $price = 'USD 100';
        } else if ($request->onsiteRegular == 'onsiteRegularLocal') {
            $type = 'Local';
            $conference = 'Onsite Regular Local';
            $price = 'IDR 900.000';
        } else if ($request->onsiteRegular == 'onsiteRegularInternational') {
            $type = 'International';
            $conference = 'Onsite Regular International';
            $price = 'USD 120';
        } else if ($request->onlineEarly == 'onlineEarlyLocal') {
            $type = 'Local';
            $conference = 'Online Early Local';
            $price = 'IDR 400.000';
        } else if ($request->onlineEarly == 'onlineEarlyInternational') {
            $type = 'International';
            $conference = 'Online Early International';
            $price = 'USD 50';
        } else if ($request->onlineRegular == 'onlineRegularLocal') {
            $type = 'Local';
            $conference = 'Online Regular Local';
            $price = 'IDR 450.000';
        } else if ($request->onlineRegular == 'onlineRegularInternational') {
            $type = 'International';
            $conference = 'Online Regular International';
            $price = 'USD 55';
        }

        return view('presenter.payment-confirmation', compact('page', 'type', 'price', 'id', 'conference'));
    }
    public function paymentAction(Request $request, $id)
    {

        $idUser = $request->session()->get('user.id_user');

        if ($request->student_card == null) {
            $file = $request->file('file');
            $filename = $this->generateFileName($file);
            $conference = $request->conference;
            $submission = Submission::find($id);
            $submission->file_pembayaran = $filename;
            $submission->type_conference = $conference;
            $submission->update();
            $file->storeAs('payment', $filename, 'public');
        } else {
            $studentCard = $request->file('student_card');
            $studentCardName =
                $this->generateFileName($studentCard);
            $file = $request->file('file');
            $filename = $this->generateFileName($file);
            $conference = $request->conference;
            $submission = Submission::find($id);
            $submission->file_pembayaran = $filename;
            $submitter = User::find($idUser);
            $submitter->student_card = $studentCardName;
            $submission->type_conference = $conference;
            $submission->update();
            $submitter->update();
            $studentCard->storeAs('student-card', $studentCardName, 'public');
            $file->storeAs('payment', $filename, 'public');
        }

        return redirect('/dashboard')->with('success', 'Payment added successfully.');
    }

    public function adminPaymentList()
    {
        $page = 'content';

        // select * from submission where file_pembayaran is not null
        $data = Submission::whereNotNull('file_pembayaran')->get();
        return view('admin.conference-payment', compact('page', 'data'));
    }

    public function paymentReupload($id)
    {
        $id = $id;
        $page = 'content';
        $submission = Submission::find($id);
        return view('presenter.payment-reupload', compact('page', 'submission', 'id'));
    }
    public function paymentReuploadAction(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $submission = Submission::find($id);
        $file = $request->file('file');
        $filename = $this->generateFileName($file);
        $submission->file_pembayaran = $filename;
        $submission->update();
        $file->storeAs('payment', $filename, 'public');
        return redirect('/dashboard')->with('success', 'Payment reupload successfully.');
    }

    private function generateFileName($file)
    {
        $originalname = $file->getClientOriginalName();
        $fileExtension = preg_match('/\.+[\S]+$/', $originalname) ? preg_replace('/^.+(\..+)$/', '$1', $originalname) : '';
        $fieldName = $file->getClientOriginalName();
        return "{$fieldName}__" . time() . $fileExtension;
    }
}