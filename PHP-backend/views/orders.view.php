<?php require_once "views/partials/header.php";?>
    <div class="container viewArea">
        <h2 class="text-center mt-4 mb-4">Orders</h2>
        <?php foreach($orders as $order):?>
        <div class="row p-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <?= date('D',strtotime($order->date)); ?> - <?= $order->date; ?> - <?= $order->time?></h5>
                        <p class="card-text m-0 mb-2"><span class="font-weight-bold">Order ID:</span> <?= $order->id?></p>
                        <p class="card-text m-0 mb-2"><span class="font-weight-bold">Name:</span> <?= $order->name?></p>
                        <p class="card-text m-0 mb-2"><span class="font-weight-bold">Address:</span> <?= $order->address?></p>
                        <p class="card-text m-0 mb-2"><span class="font-weight-bold">Email:</span> <?= $order->email?></p>
                        <p class="card-text m-0 mb-2"><span class="font-weight-bold">Phone:</span> <?= $order->phone?></p>
                        <div>
                            <p class="card-text font-weight-bold">Order:</p>
                            <table style="width: 95%;" class="text-left ml-auto mr-auto">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="pl-2">Title</th>
                                    <th class="pl-2">Extras</th>
                                    <th class="pl-2">Price</th>
                                </tr>
                                </thead>
                                <?php foreach ($item_orders as $item_order):?>
                                    <?php if($item_order->order_id == $order->id):?>
                                        <tr>
                                            <td class="border border-secondary pl-2"><?= ($item_order->order_id == $order->id) ? $item_order->title : ''; ?></td>
                                            <td class="border border-secondary pl-2"><?= ($item_order->order_id == $order->id) ? $item_order->extras : ''; ?></td>
                                            <td class="border border-secondary pl-2"><?= ($item_order->order_id == $order->id) ? number_format($item_order->price,2)."&#36;" : ''; ?></td>

                                        </tr>
                                    <?php endif;?>
                                <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td class="text-right pl-2"><span class="font-weight-bold pr-3">Price:</span></td>
                                            <td class="font-weight-bold border-bottom border-dark pl-2"> <?= number_format($order->total,2)."&#36;"?></td>
                                        </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php require_once "views/partials/footer.php"; ?>