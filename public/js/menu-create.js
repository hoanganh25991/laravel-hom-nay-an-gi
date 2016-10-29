//windows.stores in global
let $selectStores = $('#selectStores');
let $selectDishes = $('#selectDishes');
let $dishList = $('#dishList');

//@var
stores.forEach((store, index) => {
	let $option = $('<option>');
	$option.val(index);
	$option.text(store.name);

	$selectStores.append($option);
});

$selectStores.on('change', ()=>{
	let storeIndex = $selectStores.val();
	console.log('selectedStore', storeIndex);

	let dishes = stores[storeIndex].dishes;
	//remove previous list
	$selectDishes.find(':not(option:disabled)').empty();
	//load new one
	dishes.forEach(dish => {
		let $option = $('<option>');
		$option.val(dishes.id);
		$option.text(dish.name);

		$selectDishes.append($option);
	});
});

$selectStores.on('change', ()=>{
	let storeIndex = $selectStores.val();
	console.log('selectedStore', storeIndex);

	let dishes = stores[storeIndex].dishes;
	//remove previous lis
	$dishList.find('div.checkbox').empty();
	//load new one
	dishes.forEach(dish => {
		let $checkboxDiv = $(`
<div class="checkbox">
  <label><input type="checkbox" value="${dish.id}">${dish.name}</label>
</div>
`);
		$dishList.append($checkboxDiv);
	});
});