
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu</li>

    <li ><a href="{{ route('home') }}"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
    <li ><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>

    <li class="header">Gestion de votre personnage</li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Entreprise</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Votre Entreprise</a></li>
            <li><a href="#">Gestion Employé</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Dossier Criminel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Liste des Criminels</a></li>
            <li><a href="#">Liste des Crimes</a></li>
        </ul>
    </li>

    <li class="header">Section Administration</li>

    <li {{ isActiveRoute( "members" ) }} ><a href="{{ route('members') }}"><i class="fa fa-users"></i> <span>Liste des Membres</span></a></li>
    <li><a href="#"><i class="fa fa-list-ul"></i> <span>Gestion Whitelist</span></a></li>

</ul>