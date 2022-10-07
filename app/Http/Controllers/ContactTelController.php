<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactTelRequest;
use App\Http\Requests\UpdateContactTelRequest;
use App\Repositories\ContactTelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContactTelController extends AppBaseController
{
    /** @var ContactTelRepository $contactTelRepository*/
    private $contactTelRepository;

    public function __construct(ContactTelRepository $contactTelRepo)
    {
        $this->contactTelRepository = $contactTelRepo;
    }

    /**
     * Display a listing of the ContactTel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contactTels = $this->contactTelRepository->paginate(10);

        return view('contact_tels.index')
            ->with('contactTels', $contactTels);
    }

    /**
     * Show the form for creating a new ContactTel.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact_tels.create');
    }

    /**
     * Store a newly created ContactTel in storage.
     *
     * @param CreateContactTelRequest $request
     *
     * @return Response
     */
    public function store(CreateContactTelRequest $request)
    {
        $input = $request->all();

        $contactTel = $this->contactTelRepository->create($input);

        Flash::success('Contact Tel saved successfully.');

        return redirect(route('contactTels.index'));
    }

    /**
     * Display the specified ContactTel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            Flash::error('Contact Tel not found');

            return redirect(route('contactTels.index'));
        }

        return view('contact_tels.show')->with('contactTel', $contactTel);
    }

    /**
     * Show the form for editing the specified ContactTel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            Flash::error('Contact Tel not found');

            return redirect(route('contactTels.index'));
        }

        return view('contact_tels.edit')->with('contactTel', $contactTel);
    }

    /**
     * Update the specified ContactTel in storage.
     *
     * @param int $id
     * @param UpdateContactTelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactTelRequest $request)
    {
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            Flash::error('Contact Tel not found');

            return redirect(route('contactTels.index'));
        }

        $contactTel = $this->contactTelRepository->update($request->all(), $id);

        Flash::success('Contact Tel updated successfully.');

        return redirect(route('contactTels.index'));
    }

    /**
     * Remove the specified ContactTel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            Flash::error('Contact Tel not found');

            return redirect(route('contactTels.index'));
        }

        $this->contactTelRepository->delete($id);

        Flash::success('Contact Tel deleted successfully.');

        return redirect(route('contactTels.index'));
    }
}
