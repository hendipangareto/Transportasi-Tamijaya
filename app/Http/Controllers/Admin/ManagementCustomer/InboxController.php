<?php

namespace App\Http\Controllers\Admin\ManagementCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Inbox;

class InboxController extends Controller
{
    public function index()
    {
        // $provinces = Province::orderBy('state_name', 'ASC')->get();
        return view('admin.management-customer.inbox.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inboxes = Inbox::orderBy('id', 'ASC')->get();
        return view('admin.management-customer.inbox.display', ['inboxes' => $inboxes]);
    }

    public function store(Request $request)
    {
        $inbox = Inbox::create($request->all());
        return response()->json([
            'data' => $inbox,
            'message' => 'Berhasil menambahkan mengirimkan pesan',
            'status' => $inbox ? 200 : 400,
        ]);
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
    public function edit($id)
    {
        $inbox = Inbox::findOrFail($id);
        return response()->json([
            'data' => $inbox,
            'status' => $inbox ? 200 : 400,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $data = Inbox::findOrFail($id);
        $updateData = $request->all();
        $updateData['status'] = 'REPLIED';
        $data->update($updateData);
        return response()->json([
            'data' => $request->all(),
            'message' => 'Berhasil membalas pesan customer',
            'status' => $request->all() ? 200 : 400,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createInboxCustomer(Request $request)
    {
        $inbox = Inbox::create($request->all());
        return response()->json([
            'data' => $inbox,
            'message' => 'Berhasil mengirimkan pesan kepada Tami Jaya Transport',
            'status' => $inbox ? 200 : 400,
        ]);
    }
}
