<?php $__env->startSection('content'); ?>
<div class="content">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.incomes.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.income.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('cruds.income.title_singular')); ?> <?php echo e(trans('global.list')); ?>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Income">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.income.fields.id')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.income.fields.income_category')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.income.fields.entry_date')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.income.fields.amount')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.income.fields.description')); ?>

                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-entry-id="<?php echo e($income->id); ?>">
                                        <td>

                                        </td>
                                        <td>
                                            <?php echo e($income->id ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($income->income_category->name ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($income->entry_date ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($income->amount ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e($income->description ?? ''); ?>

                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_show')): ?>
                                                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.incomes.show', $income->id)); ?>">
                                                    <?php echo e(trans('global.view')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_edit')): ?>
                                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.incomes.edit', $income->id)); ?>">
                                                    <?php echo e(trans('global.edit')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_delete')): ?>
                                                <form action="<?php echo e(route('admin.incomes.destroy', $income->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('global.delete')); ?>">
                                                </form>
                                            <?php endif; ?>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
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
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.incomes.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Income:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\07072020\rose\resources\views/admin/incomes/index.blade.php ENDPATH**/ ?>