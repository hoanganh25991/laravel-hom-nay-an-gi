//stores now in global
window.menuCreate = new Vue({
	el: '#menuCreateDiv',
	// data(){
	// 	return {
	// 		stores: stores,
	// 		selectedStore: {},
	// 		selectedDish: {}
	// 	}
	// },
	data: {
		stores: stores,
		selectedStore: {},
		selectedStoreIndex: undefined,
		menu: {
			date: '',
			dishes: undefined
		},
		// menuDishes: undefined,
		menuDateInput: false
	},
	created(){
		console.log('fuck you');
		let vue = this;

		let $selectStores = $('#selectStores');
		$selectStores.on('change', function(){
			let storeIndex = $selectStores.val();
			console.log('storeIndex', storeIndex);

			// vue.selectedStore = vue.stores[storeIndex];
			vue.selectedStoreIndex = storeIndex;
			// vue.stores[storeIndex].dishes.forEach(dish => dish.selected = false);
		});

		let $menuDateInput = $('#menuDateInput');
		$menuDateInput.on('change', function(){
			vue.menuDateInput = false;
			vue.menu.date = $menuDateInput.val();
			// console.log($menuDateInput.val());
		});

		//set up default if menu.date not set
		if(!vue.menu.date){
			let today = new Date();
			vue.menu.date = `${today.getFullYear()}-${today.getMonth()+1}-${today.getDate()}`;
		}

		let $dishList = $('#dishList');
		$dishList.on('click', 'input[type="checkbox"]', function(){
			console.log('checkbox clicked');
			let dishIndex = $(this).val();
			vue.updateMenuItem(dishIndex);
		});
	},
	mounted(){

	},
	methods: {
		updateMenuItem(dishIndex){
			// console.log(element);
			// console.log(element.dish);

			// modify it into stores[selectedStoreIndex]
			let vue = this;
			let store = this.stores[this.selectedStoreIndex];
			let dish = store.dishes[dishIndex];

			if(dish.selected == undefined){
				//if not set, set it, finish
				// dish.selected = true;
				Vue.set(dish, 'selected', true);
			}else{
				dish.selected = !dish.selected;
			}

			// this.menuDishes = this.stores[this.selectedStoreIndex];
			this.menu.dishes = store.dishes.filter(dish => dish.selected);

			console.log('updateMenuItem');
		}
	},
	computed:{
		// menuDishes: function(){
		// 	let store = this.stores[this.selectedStoreIndex];
		// 	console.log(store.dishes.filter(dish => dish.selected));
		//
		// 	return store.dishes.filter(dish => dish.selected);
		// }
	},
	watch:{
		menuDateInput(newVal, oldVal){
			// console.log(newVal, oldVal);
			let $menuDateInput = $('#menuDateInput');

			if(newVal == true)
				console.log($menuDateInput.val());
		},
		stores(){
			
		}
		
	}
});