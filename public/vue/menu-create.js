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
		selectedDish: {},
		menu: {
			date: '',
			dishes: []
		},
		menuDateInput: false,
	},
	created(){
		console.log('fuck you');
		let vue = this;

		let $selectStores = $('#selectStores');
		$selectStores.on('change', function(){
			let storeIndex = $selectStores.val();
			console.log(storeIndex);

			vue.selectedStore = vue.stores[storeIndex];
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


	},
	mounted(){

	},
	methods: {
		updateMenuItem(element){
			console.log(element);
			console.log(element.dish);
		}
	},
	watch:{
		menuDateInput(newVal, oldVal){
			console.log(newVal, oldVal);
			let $menuDateInput = $('#menuDateInput');
			
			// if(newVal == true)
				// $menuDateInput.data('kendoDatePicker').open();
		}
	}
});