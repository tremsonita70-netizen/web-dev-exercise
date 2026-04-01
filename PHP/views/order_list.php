   <div class="order-container">
       <h1>Order List</h1>
       <a href="home">Top</a>
       <?= $message ?? '' ?>
       <div class="search-section">
           <form action="order_list" method="get">
               <input type="date" id="cond_date" name="cond_date" value=<?= h($cond_date) ?> />
               <button type="submit">Search</button>


           </form>
       </div>
       <div class="table-responsive">
           <table>
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Order datetime</th>
                       <th>Customer Name</th>
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($orders as $order): ?>
                       <tr>
                           <td><a href="/order_detail?id=<?= h($order['id']) ?>"><?= h($order['id']) ?></a></td>
                           <td><?= h($order['order_datetime']) ?></td>
                           <td><?= h($order['customer_name']) ?></td>

                       </tr>
                   <?php endforeach; ?>

               </tbody>
           </table>
       </div>
   </div>