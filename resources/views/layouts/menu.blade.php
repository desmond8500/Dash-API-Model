<li class="nav-item {{ Request::is('clients*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('clients.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Clients</span>
    </a>
</li>
<li class="nav-item {{ Request::is('projets*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('projets.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Projets</span>
    </a>
</li>
<li class="nav-item {{ Request::is('invoices*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('invoices.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Invoices</span>
    </a>
</li>
<li class="nav-item {{ Request::is('invoiceRows*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('invoiceRows.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Invoice Rows</span>
    </a>
</li>
<li class="nav-item {{ Request::is('invoiceSections*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('invoiceSections.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Invoice Sections</span>
    </a>
</li>
<li class="nav-item {{ Request::is('contacts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contacts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Contacts</span>
    </a>
</li>
<li class="nav-item {{ Request::is('contactTels*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contactTels.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Contact Tels</span>
    </a>
</li>
<li class="nav-item {{ Request::is('contactMails*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contactMails.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Contact Mails</span>
    </a>
</li>
<li class="nav-item {{ Request::is('buildings*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('buildings.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Buildings</span>
    </a>
</li>
<li class="nav-item {{ Request::is('stages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('stages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Stages</span>
    </a>
</li>
<li class="nav-item {{ Request::is('rooms*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('rooms.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Rooms</span>
    </a>
</li>
<li class="nav-item {{ Request::is('roomArticles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roomArticles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Room Articles</span>
    </a>
</li>
<li class="nav-item {{ Request::is('roomArticleDetails*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roomArticleDetails.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Room Article Details</span>
    </a>
</li>
<li class="nav-item {{ Request::is('reports*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reports.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Reports</span>
    </a>
</li>
<li class="nav-item {{ Request::is('reportSections*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reportSections.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Report Sections</span>
    </a>
</li>
<li class="nav-item {{ Request::is('reportPeoples*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reportPeoples.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Report Peoples</span>
    </a>
</li>
<li class="nav-item {{ Request::is('reportDevis*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reportDevis.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Report Devis</span>
    </a>
</li>
<li class="nav-item {{ Request::is('reportModalites*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reportModalites.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Report Modalites</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tasks*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tasks.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Tasks</span>
    </a>
</li>
<li class="nav-item {{ Request::is('taskPhotos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('taskPhotos.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Task Photos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('taskDocuments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('taskDocuments.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Task Documents</span>
    </a>
</li>
<li class="nav-item {{ Request::is('systems*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('systems.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Systems</span>
    </a>
</li>
<li class="nav-item {{ Request::is('fichiers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('fichiers.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Fichiers</span>
    </a>
</li>
<li class="nav-item {{ Request::is('reportFiles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reportFiles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Report Files</span>
    </a>
</li>
<li class="nav-item {{ Request::is('personnels*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('personnels.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Personnels</span>
    </a>
</li>
<li class="nav-item {{ Request::is('comptes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('comptes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Comptes</span>
    </a>
</li>
