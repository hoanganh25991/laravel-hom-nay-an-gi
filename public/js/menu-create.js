//windows.stores in global
let $selectStores = $('#selectStores');
let $selectDishes = $('#selectDishes');
let $dishList = $('#dishList');
let $menuJson = $('#menuJson');

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
//store in global
let dishes;

$selectStores.on('change', ()=>{
	let storeIndex = $selectStores.val();
	console.log('selectedStore', storeIndex);

	dishes = stores[storeIndex].dishes;
	//remove previous lis
	$dishList.find('div.checkbox').empty();
	//load new one
	dishes.forEach((dish, index) => {
		let $checkboxDiv = $(`
<div class="checkbox">
  <label><input type="checkbox" value="${index}">${dish.name}</label>
</div>
`);
		$dishList.append($checkboxDiv);
	});
});

let menu = [];

$dishList.on('click', 'input[type="checkbox"]', function(){
	let $checkbox = $(this);
	let isChecked = $checkbox.is(':checked');

	let dish = dishes[$checkbox.val()];
	console.log(dish);

	if(isChecked){
		menu.push(dish);
	}else{
		//@warn: what make this is the REVERSE of the above???
		menu.splice($checkbox.val(), 1);
}

	//event HELL
	// after modify on menu
	//show them back in other thing

	//@warn: menu simple as stringify
	//what if it build up BY MENU > all action come from 'click'
	//need to be NESTED here
	$menuJson.text(JSON.stringify(menu));
	$menuJson.scrollTop(10000);
});

