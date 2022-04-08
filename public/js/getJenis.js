const merkSelect = document.getElementById('merk-id');
const jenisSelect = document.getElementById('jenis-id');

document.addEventListener('DOMContentLoaded', function() {
	merkSelect.addEventListener('change', async function(){
		jenisSelect.selectedIndex = 0;
		const res = await fetch(
			`/api/data/${merkSelect.options[merkSelect.selectedIndex].value}`
		);

		let data = await res.json();
		jenisSelect.innerHTML = '<option selected disabled>Pilih Jenis Kendaraan</option>';

		data.forEach(e => {
			jenisSelect.insertAdjacentHTML(
				'beforeend', `<option value='${e.id}'>${e.jenis}</option>`
			);
		});
	});
});