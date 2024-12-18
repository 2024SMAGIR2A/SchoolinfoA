<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SchoolMG | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">


    @yield('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @php
        $comapny = \App\Models\company::firstOrFail();
    @endphp

    <div class="wrapper">



        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item dropdown user-menu">

                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @isset(Auth::user()->image)
                            <img src="{{ url('images/users/' . Auth::user()->image) }}"
                                class="user-image img-circle elevation-2" alt="User Image">
                        @else
                            <img src="{{ url('images/users/user.jpg') }}" class="user-image img-circle elevation-2"
                                alt="User Image">
                        @endisset
                        <span class="d-none d-md-inline">{{ Auth::user()->first_name }}</span>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">

                            <i class="fas fa-user mr-2"></i>{{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}

                        </a>



                        <div class="dropdown-divider"></div>



                        <a href="#" class="dropdown-item">

                            <i class="fas fa-envelope mr-2"></i>{{ Auth::user()->email }}

                        </a>



                        <div class="dropdown-divider"></div>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>

                            @csrf

                        </form>



                        <a href="#" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                            <i class="fas fa-lock mr-2"></i>{{ __('Logout') }}

                        </a>

                    </ul>

                </li>
                <!-- Messages Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('collaborator.home') }}" class="brand-link">
                <img src="{{ !empty($comapny->logo) ? url('images/companies/logos/' . $comapny->logo) : url('images/companies/logo_default_image.jpg') }}"
                    alt="SchoolMG" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SchoolMG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('collaborator.home') }}"
                                class="nav-link {{ currentRouteActive('collaborator.home') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tableau de bord
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profil

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-business-time"></i>
                                <p>
                                    Emploi du temps
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Mes cours

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>
                                    Mes Notes
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Payement de scolarité

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-trash"></i>
                                <p>
                                    Corbeilles
                                </p>
                            </a>
                        </li>











                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                SchoolMG edition : Collaborator
            </div><!-- Default to the left -->
            <strong>Copyright &copy; 2024 <a href="#">SchoolMG v.1.0</a>.</strong> Tous droits réservés.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name="
                            csrf - token "]"
                            ").attr("
                            content ")
                        }
                    });

                $(function() {
                    //Add text editor
                    $("#compose-textarea").summernote()

                })

                $(function() {
                    $("#example1").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": false,
                        // order: [[0, 'desc']],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        //"buttons": ["Copier", "Csv", "excel", "pdf", "Imprimer", "colvis"]
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                });

                $(function() {
                    $("#example2").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                });

                $(function() {
                    $("#example3").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });

                $(function() {
                    $("#example4").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });

                $(function() {
                    $("#example5").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });

                $(function() {
                    $("#example6").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });

                $(function() {
                    $("#example7").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });

                $(function() {
                    $("#example8").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });

                $(function() {
                    $("#example9").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        order: [
                            [0, 'desc']
                        ],

                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": {
                            "emptyTable": "Aucune donnée disponible dans le tableau",
                            "loadingRecords": "Chargement...",
                            "processing": "Traitement...",
                            "select": {
                                "rows": {
                                    "_": "%d lignes sélectionnées",
                                    "1": "1 ligne sélectionnée"
                                },
                                "cells": {
                                    "1": "1 cellule sélectionnée",
                                    "_": "%d cellules sélectionnées"
                                },
                                "columns": {
                                    "1": "1 colonne sélectionnée",
                                    "_": "%d colonnes sélectionnées"
                                }
                            },
                            "autoFill": {
                                "cancel": "Annuler",
                                "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                                "fillHorizontal": "Remplir les cellules horizontalement",
                                "fillVertical": "Remplir les cellules verticalement"
                            },
                            "searchBuilder": {
                                "conditions": {
                                    "date": {
                                        "after": "Après le",
                                        "before": "Avant le",
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "number": {
                                        "between": "Entre",
                                        "empty": "Vide",
                                        "gt": "Supérieur à",
                                        "gte": "Supérieur ou égal à",
                                        "lt": "Inférieur à",
                                        "lte": "Inférieur ou égal à",
                                        "not": "Différent de",
                                        "notBetween": "Pas entre",
                                        "notEmpty": "Non vide",
                                        "equals": "Égal à"
                                    },
                                    "string": {
                                        "contains": "Contient",
                                        "empty": "Vide",
                                        "endsWith": "Se termine par",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "startsWith": "Commence par",
                                        "equals": "Égal à",
                                        "notContains": "Ne contient pas",
                                        "notEndsWith": "Ne termine pas par",
                                        "notStartsWith": "Ne commence pas par"
                                    },
                                    "array": {
                                        "empty": "Vide",
                                        "contains": "Contient",
                                        "not": "Différent de",
                                        "notEmpty": "Non vide",
                                        "without": "Sans",
                                        "equals": "Égal à"
                                    }
                                },
                                "add": "Ajouter une condition",
                                "button": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "clearAll": "Effacer tout",
                                "condition": "Condition",
                                "data": "Donnée",
                                "deleteTitle": "Supprimer la règle de filtrage",
                                "logicAnd": "Et",
                                "logicOr": "Ou",
                                "title": {
                                    "0": "Recherche avancée",
                                    "_": "Recherche avancée (%d)"
                                },
                                "value": "Valeur",
                                "leftTitle": "Désindenter le critère",
                                "rightTitle": "Indenter le critère"
                            },
                            "searchPanes": {
                                "clearMessage": "Effacer tout",
                                "count": "{total}",
                                "title": "Filtres actifs - %d",
                                "collapse": {
                                    "0": "Volet de recherche",
                                    "_": "Volet de recherche (%d)"
                                },
                                "countFiltered": "{shown} ({total})",
                                "emptyPanes": "Pas de volet de recherche",
                                "loadMessage": "Chargement du volet de recherche...",
                                "collapseMessage": "Réduire tout",
                                "showMessage": "Montrer tout"
                            },
                            "buttons": {
                                "collection": "Collection",
                                "colvis": "Visibilité colonnes",
                                "colvisRestore": "Rétablir visibilité",
                                "copy": "Copier",
                                "copySuccess": {
                                    "1": "1 ligne copiée dans le presse-papier",
                                    "_": "%d lignes copiées dans le presse-papier"
                                },
                                "copyTitle": "Copier dans le presse-papier",
                                "csv": "CSV",
                                "excel": "Excel",
                                "pageLength": {
                                    "-1": "Afficher toutes les lignes",
                                    "_": "Afficher %d lignes",
                                    "1": "Afficher 1 ligne"
                                },
                                "pdf": "PDF",
                                "print": "Imprimer",
                                "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier.",
                                "createState": "Créer un état",
                                "removeAllStates": "Supprimer tous les états",
                                "removeState": "Supprimer",
                                "renameState": "Renommer",
                                "savedStates": "États sauvegardés",
                                "stateRestore": "État %d",
                                "updateState": "Mettre à jour"
                            },
                            "decimal": ",",
                            "datetime": {
                                "previous": "Précédent",
                                "next": "Suivant",
                                "hours": "Heures",
                                "minutes": "Minutes",
                                "seconds": "Secondes",
                                "unknown": "-",
                                "amPm": [
                                    "am",
                                    "pm"
                                ],
                                "months": {
                                    "0": "Janvier",
                                    "2": "Mars",
                                    "3": "Avril",
                                    "4": "Mai",
                                    "5": "Juin",
                                    "6": "Juillet",
                                    "8": "Septembre",
                                    "9": "Octobre",
                                    "10": "Novembre",
                                    "1": "Février",
                                    "11": "Décembre",
                                    "7": "Août"
                                },
                                "weekdays": [
                                    "Dim",
                                    "Lun",
                                    "Mar",
                                    "Mer",
                                    "Jeu",
                                    "Ven",
                                    "Sam"
                                ]
                            },
                            "editor": {
                                "close": "Fermer",
                                "create": {
                                    "title": "Créer une nouvelle entrée",
                                    "button": "Nouveau",
                                    "submit": "Créer"
                                },
                                "edit": {
                                    "button": "Editer",
                                    "title": "Editer Entrée",
                                    "submit": "Mettre à jour"
                                },
                                "remove": {
                                    "button": "Supprimer",
                                    "title": "Supprimer",
                                    "submit": "Supprimer",
                                    "confirm": {
                                        "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                        "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                    }
                                },
                                "multi": {
                                    "title": "Valeurs multiples",
                                    "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles.",
                                    "restore": "Annuler les modifications",
                                    "noMulti": "Ce champ peut être modifié individuellement, mais ne fait pas partie d'un groupe. "
                                },
                                "error": {
                                    "system": "Une erreur système s'est produite (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Plus d'information<\/a>)."
                                }
                            },
                            "stateRestore": {
                                "removeSubmit": "Supprimer",
                                "creationModal": {
                                    "button": "Créer",
                                    "order": "Tri",
                                    "paging": "Pagination",
                                    "scroller": "Position du défilement",
                                    "search": "Recherche",
                                    "select": "Sélection",
                                    "columns": {
                                        "search": "Recherche par colonne",
                                        "visible": "Visibilité des colonnes"
                                    },
                                    "name": "Nom :",
                                    "searchBuilder": "Recherche avancée",
                                    "title": "Créer un nouvel état",
                                    "toggleLabel": "Inclus :"
                                },
                                "renameButton": "Renommer",
                                "duplicateError": "Il existe déjà un état avec ce nom.",
                                "emptyError": "Le nom ne peut pas être vide.",
                                "emptyStates": "Aucun état sauvegardé",
                                "removeConfirm": "Voulez vous vraiment supprimer %s ?",
                                "removeError": "Échec de la suppression de l'état.",
                                "removeJoiner": "et",
                                "removeTitle": "Supprimer l'état",
                                "renameLabel": "Nouveau nom pour %s :",
                                "renameTitle": "Renommer l'état"
                            },
                            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                            "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                            "lengthMenu": "Afficher _MENU_ entrées",
                            "paginate": {
                                "first": "Première",
                                "last": "Dernière",
                                "next": "Suivante",
                                "previous": "Précédente"
                            },
                            "zeroRecords": "Aucune entrée correspondante trouvée",
                            "aria": {
                                "sortAscending": " : activer pour trier la colonne par ordre croissant",
                                "sortDescending": " : activer pour trier la colonne par ordre décroissant"
                            },
                            "infoThousands": " ",
                            "search": "Rechercher :",
                            "thousands": " "
                        }

                    });

                });
    </script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(function() {
            /*$(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                }) 
            });*/
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Suppression de donnée',
                    text: "Êtes-vous sûr ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'supprimée!',
                            'Votre donnée a été supprimée.',
                            'success'
                        )
                    }
                })
            });
            /*$(document).on('click','.delete-select',function(e){
                e.preventDefault();
                var link = $(this)[0].value.split(' ')[1];
                //console.log($(this)[0].value.split('-')[1]);
                Swal.fire({
                    title: 'Suppression de donnée',
                    text: "Êtes-vous sûr ?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText:'Non,plus tard',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimé!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                        'supprimée!',
                        'Votre donnée a été supprimée.',
                        'success'
                        )
                    }
                    else{
                        // i use this to reset and the first item of select-action
                        $(".select-action").prop("selectedIndex", 0);
                        //window.location.href = '{{ Request::url() }}';
                    }
                }) 
            });*/
        });
    </script>


    @yield('js')
</body>

</html>
