<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactMailRequest;
use App\Http\Requests\UpdateContactMailRequest;
use App\Repositories\ContactMailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContactMailController extends AppBaseController
{
    /** @var ContactMailRepository $contactMailRepository*/
    private $contactMailRepository;

    public function __construct(ContactMailRepository $contactMailRepo)
    {
        $this->contactMailRepository = $contactMailRepo;
    }

    /**
     * Display a listing of the ContactMail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contactMails = $this->contactMailRepository->paginate(10);

        return view('contact_mails.index')
            ->with('contactMails', $contactMails);
    }

    /**
     * Show the form for creating a new ContactMail.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact_mails.create');
    }

    /**
     * Store a newly created ContactMail in storage.
     *
     * @param CreateContactMailRequest $request
     *
     * @return Response
     */
    public function store(CreateContactMailRequest $request)
    {
        $input = $request->all();

        $contactMail = $this->contactMailRepository->create($input);

        Flash::success('Contact Mail saved successfully.');

        return redirect(route('contactMails.index'));
    }

    /**
     * Display the specified ContactMail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            Flash::error('Contact Mail not found');

            return redirect(route('contactMails.index'));
        }

        return view('contact_mails.show')->with('contactMail', $contactMail);
    }

    /**
     * Show the form for editing the specified ContactMail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            Flash::error('Contact Mail not found');

            return redirect(route('contactMails.index'));
        }

        return view('contact_mails.edit')->with('contactMail', $contactMail);
    }

    /**
     * Update the specified ContactMail in storage.
     *
     * @param int $id
     * @param UpdateContactMailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactMailRequest $request)
    {
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            Flash::error('Contact Mail not found');

            return redirect(route('contactMails.index'));
        }

        $contactMail = $this->contactMailRepository->update($request->all(), $id);

        Flash::success('Contact Mail updated successfully.');

        return redirect(route('contactMails.index'));
    }

    /**
     * Remove the specified ContactMail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            Flash::error('Contact Mail not found');

            return redirect(route('contactMails.index'));
        }

        $this->contactMailRepository->delete($id);

        Flash::success('Contact Mail deleted successfully.');

        return redirect(route('contactMails.index'));
    }
}
