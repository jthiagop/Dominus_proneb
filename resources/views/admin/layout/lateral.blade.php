<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Account)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <div class="sidenav-menu-heading d-sm-none">Account</div>
            <!-- Sidenav Link (Alerts)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                Alerts
                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
            </a>
            <!-- Sidenav Link (Messages)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Messages
                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
            </a>
            @if (Auth::user()->user_type == 'superadmin')

            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading">Core</div>
            <!-- Sidenav Accordion (Dashboard)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Entidades
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{route('company.index')}}">
                        Matriz
                        <span class="badge bg-primary-soft text-primary ms-auto">
                            {{ Request::segment(1)}}
                        </span>
                    </a>
                    <a class="nav-link" href="">Organismos</a>
                    <a class="nav-link" href="{{route('superadmin.list')}}">User Admin</a>
                    <a class="nav-link" href="{{route('standard.list')}}">Lançamento Padrão</a>
                    <a class="nav-link" href="{{route('bancos.index')}}">Cadastro de banco</a>

                </nav>
            </div>
            @endif

            <!-- Sidenav Heading (Custom)-->
            <div class="sidenav-menu-heading">Custom</div>
            <!-- Sidenav Accordion (Pages)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Cadastros
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                    <!-- Nested Sidenav Accordion (Pages -> Account)-->
                    <a class="nav-link" href="{{route('standard.list')}}">Lançamento Padrão</a>
                    <a class="nav-link" href="{{route('Lbancos.index')}}">Cadastro de banco</a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                        Account
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAccount" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('standard.list')}}">Lançamento Padrão</a>
                            <a class="nav-link" href="account-billing.html">Billing</a>
                            <a class="nav-link" href="account-security.html">Security</a>
                            <a class="nav-link" href="account-notifications.html">Notifications</a>
                        </nav>
                    </div>
                    <!-- Nested Sidenav Accordion (Pages -> Authentication)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesAuth">
                            <!-- Nested Sidenav Accordion (Pages -> Authentication -> Basic)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthBasic" aria-expanded="false" aria-controls="pagesCollapseAuthBasic">
                                Basic
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuthBasic" data-bs-parent="#accordionSidenavPagesAuth">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="auth-login-basic.html">Login</a>
                                    <a class="nav-link" href="auth-register-basic.html">Register</a>
                                    <a class="nav-link" href="auth-password-basic.html">Forgot Password</a>
                                </nav>
                            </div>
                            <!-- Nested Sidenav Accordion (Pages -> Authentication -> Social)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthSocial" aria-expanded="false" aria-controls="pagesCollapseAuthSocial">
                                Social
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuthSocial" data-bs-parent="#accordionSidenavPagesAuth">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="auth-login-social.html">Login</a>
                                    <a class="nav-link" href="auth-register-social.html">Register</a>
                                    <a class="nav-link" href="auth-password-social.html">Forgot Password</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <!-- Nested Sidenav Accordion (Pages -> Error)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="error-400.html">400 Error</a>
                            <a class="nav-link" href="error-401.html">401 Error</a>
                            <a class="nav-link" href="error-403.html">403 Error</a>
                            <a class="nav-link" href="error-404-1.html">404 Error 1</a>
                            <a class="nav-link" href="error-404-2.html">404 Error 2</a>
                            <a class="nav-link" href="error-500.html">500 Error</a>
                            <a class="nav-link" href="error-503.html">503 Error</a>
                            <a class="nav-link" href="error-504.html">504 Error</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="pricing.html">Pricing</a>
                    <a class="nav-link" href="invoice.html">Invoice</a>
                </nav>
            </div>
            <!-- Sidenav Accordion (Applications)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                <div class="nav-link-icon"><i data-feather="globe"></i></div>
                Applications
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                    <!-- Nested Sidenav Accordion (Apps -> Knowledge Base)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapseKnowledgeBase" aria-expanded="false" aria-controls="appsCollapseKnowledgeBase">
                        Knowledge Base
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="appsCollapseKnowledgeBase" data-bs-parent="#accordionSidenavAppsMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="knowledge-base-home-1.html">Home 1</a>
                            <a class="nav-link" href="knowledge-base-home-2.html">Home 2</a>
                            <a class="nav-link" href="knowledge-base-category.html">Category</a>
                            <a class="nav-link" href="knowledge-base-article.html">Article</a>
                        </nav>
                    </div>
                    <!-- Nested Sidenav Accordion (Apps -> User Management)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapseUserManagement" aria-expanded="false" aria-controls="appsCollapseUserManagement">
                        User Management
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="appsCollapseUserManagement" data-bs-parent="#accordionSidenavAppsMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="user-management-list.html">Users List</a>
                            <a class="nav-link" href="user-management-edit-user.html">Edit User</a>
                            <a class="nav-link" href="user-management-add-user.html">Add User</a>
                            <a class="nav-link" href="user-management-groups-list.html">Groups List</a>
                            <a class="nav-link" href="user-management-org-details.html">Organization Details</a>
                        </nav>
                    </div>
                    <!-- Nested Sidenav Accordion (Apps -> Posts Management)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapsePostsManagement" aria-expanded="false" aria-controls="appsCollapsePostsManagement">
                        Posts Management
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="appsCollapsePostsManagement" data-bs-parent="#accordionSidenavAppsMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="blog-management-posts-list.html">Posts List</a>
                            <a class="nav-link" href="blog-management-create-post.html">Create Post</a>
                            <a class="nav-link" href="blog-management-edit-post.html">Edit Post</a>
                            <a class="nav-link" href="blog-management-posts-admin.html">Posts Admin</a>
                        </nav>
                    </div>
                </nav>
            </div>
            <!-- Sidenav Accordion (Flows)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                Flows
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link" href="multi-tenant-select.html">Multi-Tenant Registration</a>
                    <a class="nav-link" href="wizard.html">Wizard</a>
                </nav>
            </div>

        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"></div>
        </div>
    </div>
</nav>
