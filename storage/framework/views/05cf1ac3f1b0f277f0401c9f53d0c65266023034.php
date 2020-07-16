<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="<?php echo e(route("admin.home")); ?>">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    <?php echo e(trans('global.dashboard')); ?>

                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span><?php echo e(trans('cruds.userManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                            <li class="<?php echo e(request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.permissions.index")); ?>">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span><?php echo e(trans('cruds.permission.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li class="<?php echo e(request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.roles.index")); ?>">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span><?php echo e(trans('cruds.role.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li class="<?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.users.index")); ?>">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span><?php echo e(trans('cruds.user.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit_log_access')): ?>
                            <li class="<?php echo e(request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.audit-logs.index")); ?>">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span><?php echo e(trans('cruds.auditLog.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span><?php echo e(trans('cruds.expenseManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_category_access')): ?>
                            <li class="<?php echo e(request()->is('admin/expense-categories') || request()->is('admin/expense-categories/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.expense-categories.index")); ?>">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span><?php echo e(trans('cruds.expenseCategory.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_category_access')): ?>
                            <li class="<?php echo e(request()->is('admin/income-categories') || request()->is('admin/income-categories/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.income-categories.index")); ?>">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span><?php echo e(trans('cruds.incomeCategory.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_access')): ?>
                            <li class="<?php echo e(request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.expenses.index")); ?>">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span><?php echo e(trans('cruds.expense.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_access')): ?>
                            <li class="<?php echo e(request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.incomes.index")); ?>">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span><?php echo e(trans('cruds.income.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_report_access')): ?>
                            <li class="<?php echo e(request()->is('admin/expense-reports') || request()->is('admin/expense-reports/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.expense-reports.index")); ?>">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span><?php echo e(trans('cruds.expenseReport.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cartegory_access')): ?>
                            <li class="<?php echo e(request()->is('admin/cartegories') || request()->is('admin/cartegories/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.cartegories.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.cartegory.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_access')): ?>
                            <li class="<?php echo e(request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.services.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.service.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span><?php echo e(trans('cruds.management.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('branch_access')): ?>
                            <li class="<?php echo e(request()->is('admin/branches') || request()->is('admin/branches/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.branches.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.branch.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_access')): ?>
                            <li class="<?php echo e(request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.departments.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.department.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_access')): ?>
                            <li class="<?php echo e(request()->is('admin/employees') || request()->is('admin/employees/*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route("admin.employees.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.employee.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profile_password_edit')): ?>
                    <li class="<?php echo e(request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('profile.password.edit')); ?>">
                            <i class="fa-fw fas fa-key">
                            </i>
                            <?php echo e(trans('global.change_password')); ?>

                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    <?php echo e(trans('global.logout')); ?>

                </a>
            </li>
        </ul>
    </section>
</aside><?php /**PATH C:\xampp\htdocs\07072020\rose\resources\views/partials/menu.blade.php ENDPATH**/ ?>