<?php
$content = content('transaction.content');
$recentTransactions = App\Models\Payment::with('user', 'gateway')
                                        ->latest()
                                        ->where('payment_status',1)
                                        ->limit(10)
                                        ->get();
$recentwithdraw = App\Models\Withdraw::with('user', 'withdrawMethod')
                                      ->latest()
                                      ->where('status',1)
                                      ->limit(10)
                                      ->get();

?>

  <section class="transaction-section sp_pt_120 sp_pb_120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
            <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="transaction-wrapper">
              <div class="transaction-wrapper-top mb-4">
                <h4 class="title"><?php echo e(__('Transaction history')); ?></h4>
                <ul class="nav nav-pills transaction-tabs" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true"><?php echo e(__('Latest Invests')); ?></button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false"><?php echo e(__('Latest Withdraws')); ?></button>
                  </li>
                </ul>
              </div>
              
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane table-content fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table site-table">
                      <thead>
                          <tr class="bg-yellow">
                              <th scope="col"><?php echo e(__('Username')); ?></th>
                              <th scope="col"><?php echo e(__('Date')); ?></th>
                              <th scope="col"><?php echo e(__('Amount')); ?></th>
                              <th scope="col"><?php echo e(__('Gateway')); ?></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__empty_1 = true; $__currentLoopData = $recentTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                              <tr>
                                  <td data-caption="<?php echo e(__('Username')); ?>"><?php echo e(@$item->user->username); ?></td>
                                  <td data-caption="<?php echo e(__('Date')); ?>">
                                      <?php echo e($item->created_at->format('Y-m-d')); ?></td>
                                  <td data-caption="<?php echo e(__('Amount')); ?>">
                                      <?php echo e(number_format($item->amount, 2) . ' ' . @$general->site_currency); ?></td>
                                  <td data-caption="<?php echo e(__('Gateway')); ?>"><?php echo e(@$item->gateway->gateway_name ?? 'Deposit'); ?>

                                  </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <tr>
                                  <td data-caption="<?php echo e(__('Status')); ?>" class="text-center" colspan="100%">
                                      <?php echo e(__('No Data Found')); ?>

                                  </td>
                              </tr>
                          <?php endif; ?>
                      </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <table class="table site-table">
                      <thead>
                          <tr class="bg-yellow">
                              <th scope="col"><?php echo e(__('Name')); ?></th>
                              <th scope="col"><?php echo e(__('Date')); ?></th>
                              <th scope="col"><?php echo e(__('Amount')); ?></th>
                              <th scope="col"><?php echo e(__('Gateway')); ?></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $__empty_1 = true; $__currentLoopData = $recentwithdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                              <tr>
                                  <td data-caption="<?php echo e(__('Name')); ?>"><?php echo e(@$item->user->username); ?></td>
                                  <td data-caption="<?php echo e(__('Date')); ?>">
                                      <?php echo e($item->created_at->format('Y-m-d')); ?></td>
                                  <td data-caption="<?php echo e(__('Amount')); ?>">
                                      <?php echo e(number_format($item->withdraw_amount, 2) . ' ' . @$general->site_currency); ?>

                                  </td>
                                  <td data-caption="<?php echo e(__('Gateway')); ?>"><?php echo e($item->withdrawMethod->name); ?>

                                  </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <tr>
                                  <td data-caption="<?php echo e(__('Status')); ?>" class="text-center" colspan="100%">
                                      <?php echo e(__('No Data Found')); ?>

                                  </td>
                              </tr>
                          <?php endif; ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/transaction.blade.php ENDPATH**/ ?>