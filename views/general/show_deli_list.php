<div class="ky-table-container">
	<table class="ky-table">
		<caption class="ky-deli-cap">Delivery Range<i class="ky-truk fa fa-truck"></i></caption>
		<thead>
	    <tr>
	      <th>No.</th>
	      <th>Name</th>
	      <th>States and Regions</th>
	      <th>Price</th>
	      <th>Lead Time</th>
	    </tr>
	  </thead>

	  <tbody>
	  	<?php $count=1; foreach($data as $deli): ?>
			  <tr>
					<td><?php echo $count++ ?></td>
					<td><?php echo $deli['name'] ?></td>
					<td><?php echo $deli['states_and_regions'] ?></td>
					<td><?php echo number_format($deli['price']) ?>Ks</td>
					<td><?php echo $deli['lead_time'] ?></td>
			  </tr>
			 <?php endforeach; ?>
	  </tbody>
	  
	</table>
</div>