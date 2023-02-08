<div>
    @if ($status==1)
        <span class="status status-blue">
            <span class="status-dot"></span>
            Nouveau
        </span>
    @elseif($status==2)
        <span class="status status-orange">
            <span class="status-dot"></span>
            En Cours
        </span>
    @elseif($status==3)
        <span class="status status-black">
            <span class="status-dot"></span>
            En Pause
        </span>
    @elseif($status==4)
        <span class="status status-green">
            <span class="status-dot"></span>
            Terminé
        </span>
    @elseif($status==5)
        <span class="status status-red">
            <span class="status-dot"></span>
            Annulé
        </span>
    @endif
</div>
