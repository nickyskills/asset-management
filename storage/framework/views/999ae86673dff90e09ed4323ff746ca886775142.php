<?php $__env->startSection('content'); ?>
<div class="content">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.employees.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.employee.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.employee.title_singular')); ?> <?php echo e(trans('global.list')); ?>

                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.id')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.employee_number')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.first_name')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.middle_name')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.surname')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.address')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.branch')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.branch.fields.department')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.employee.fields.user')); ?>

                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value><?php echo e(trans('global.all')); ?></option>
                                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="<?php echo e(trans('global.search')); ?>">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value><?php echo e(trans('global.all')); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->email); ?>"><?php echo e($item->email); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.employees.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        return
      }

      if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
<?php endif; ?>

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "<?php echo e(route('admin.employees.index')); ?>",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'employee_number', name: 'employee_number' },
{ data: 'first_name', name: 'first_name' },
{ data: 'middle_name', name: 'middle_name' },
{ data: 'surname', name: 'surname' },
{ data: 'address', name: 'address' },
{ data: 'branch_name', name: 'branch.name' },
{ data: 'branch.department', name: 'branch.department' },
{ data: 'user_email', name: 'user.email' },
{ data: 'actions', name: '<?php echo e(trans('global.actions')); ?>' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Employee').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\07072020\rose\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>