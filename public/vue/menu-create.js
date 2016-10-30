//stores now in global
window.menuCreate = new Vue({
	el: '#menuCreateDiv',
	data(){
		return {
			stores: stores,
			selectedStore: {},
			selectedStoreIndex: undefined,
			menu: {
				date: '',
				dishes: undefined
			},
			menuDateInput: false
		}
	},
	created(){
		let vue = this;

		let $selectStores = $('#selectStores');
		$selectStores.on('change', function(){
			let storeIndex = $selectStores.val();
			console.log('storeIndex', storeIndex);
			vue.selectedStoreIndex = storeIndex;
		});

		let $menuDateInput = $('#menuDateInput');
		let options = {
			weekStart: 1,
			keyboardNavigation: false,
			todayHighlight: true,
			orientation: "bottom right"
		};
		$menuDateInput.datepicker(options).on('changeDate', function(){
			vue.menuDateInput = false;

			let pickedDate = $menuDateInput.datepicker('getDate');
			vue.menu.date =`${pickedDate.getFullYear()}-${pickedDate.getMonth()+1}-${pickedDate.getDate()}`;
			$menuDateInput.datepicker('hide');
		});

		//set up default if menu.date not set
		if(!vue.menu.date){
			let today = new Date();
			//have to follow yyyy-mm-dd format for input[type=date
			vue.menu.date = `${today.getFullYear()}-${today.getMonth()+1}-${today.getDate()}`;
		}
	},
	methods: {
		updateMenuItem(dishIndex){
			// let vue = this;
			let store = this.stores[this.selectedStoreIndex];
			let dish = store.dishes[dishIndex];

			if(dish.selected == undefined){
				//create observer on dish
				Vue.set(dish, 'selected', true);
			}else{
				dish.selected = !dish.selected;
			}
			//update through menu.dishes to review
			this.menu.dishes = store.dishes.filter(dish => dish.selected);
			console.log('updateMenuItem');
		}
	},
	watch:{
		menuDateInput(newVal){
			if(newVal == true){
				// let $menuDateInput = $('#menuDateInput').datepicker('show');
				$('#menuDateInput').datepicker('show');
			}
		}
	}
});