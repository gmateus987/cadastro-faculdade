function maskValue(inputValue) {
	var altValue = inputValue.value;
	altValue = altValue.replace(/\D/g, ""); // Remove todos os não dígitos
	altValue = altValue.replace(/(\d+)(\d{2})$/, "$1,$2"); // Adiciona a parte de centavos
	altValue = altValue.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // Adiciona pontos a cada três dígitos
	inputValue.value = altValue;
}