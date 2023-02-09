<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Repositories\SystemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SystemController extends AppBaseController
{
    /** @var SystemRepository $systemRepository*/
    private $systemRepository;

    public function __construct(SystemRepository $systemRepo)
    {
        $this->systemRepository = $systemRepo;
    }

    /**
     * Display a listing of the System.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $systems = $this->systemRepository->paginate(10);

        return view('systems.index')
            ->with('systems', $systems);
    }

    /**
     * Show the form for creating a new System.
     *
     * @return Response
     */
    public function create()
    {
        return view('systems.create');
    }

    /**
     * Store a newly created System in storage.
     *
     * @param CreateSystemRequest $request
     *
     * @return Response
     */
    public function store(CreateSystemRequest $request)
    {
        $input = $request->all();

        $system = $this->systemRepository->create($input);

        Flash::success('System saved successfully.');

        return redirect(route('systems.index'));
    }

    /**
     * Display the specified System.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            Flash::error('System not found');

            return redirect(route('systems.index'));
        }

        return view('systems.show')->with('system', $system);
    }

    /**
     * Show the form for editing the specified System.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            Flash::error('System not found');

            return redirect(route('systems.index'));
        }

        return view('systems.edit')->with('system', $system);
    }

    /**
     * Update the specified System in storage.
     *
     * @param int $id
     * @param UpdateSystemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSystemRequest $request)
    {
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            Flash::error('System not found');

            return redirect(route('systems.index'));
        }

        $system = $this->systemRepository->update($request->all(), $id);

        Flash::success('System updated successfully.');

        return redirect(route('systems.index'));
    }

    /**
     * Remove the specified System from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            Flash::error('System not found');

            return redirect(route('systems.index'));
        }

        $this->systemRepository->delete($id);

        Flash::success('System deleted successfully.');

        return redirect(route('systems.index'));
    }
}
