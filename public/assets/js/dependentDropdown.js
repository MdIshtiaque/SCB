document.addEventListener('DOMContentLoaded', function () {
    const districtSelect = document.getElementById('districtSelect');
    const developmentBlockSelect = document.getElementById('developmentBlockSelect');
    const villageSelect = document.getElementById('villageSelect');
    const gramSelect = document.getElementById('gramSelect');
    const divisionSelect = document.getElementById('divisionSelect');
    const rangeSelect = document.getElementById('rangeSelect');

    divisionSelect.addEventListener('change', async () => {
        try {
            await updateRangeOptions(divisionSelect.value, rangeSelect);
        } catch (error) {
            console.error('Error loading the range:', error);
            toastr.error('Failed to load range: ' + error.message);
        }
    });

    districtSelect.addEventListener('change', async () => {
        try {
            await updateDevelopmentOptions(districtSelect.value, developmentBlockSelect);
            // Always reset village dropdown when district changes
            resetDropdown(villageSelect, 'Select Village');
            resetDropdown(gramSelect, 'Select Gram Panchayat');
        } catch (error) {
            console.error('Error loading the development blocks:', error);
            toastr.error('Failed to load development blocks: ' + error.message);
        }
    });

    developmentBlockSelect.addEventListener('change', async () => {
        if (developmentBlockSelect.value) {
            try {
                await updateVillageOptions(developmentBlockSelect.value, villageSelect);
                resetDropdown(gramSelect, 'Select Gram Panchayat'); // Reset Gram Panchayat when Development Block changes
            } catch (error) {
                console.error('Error loading the villages:', error);
                toastr.error('Failed to load villages: ' + error.message);
            }
        } else {
            // Reset village dropdown if no valid development block is selected
            resetDropdown(villageFloatSelect, 'Select Village');
        }
    });

    villageSelect.addEventListener('change', async () => {
        if (villageSelect.value) {
            try {
                await updateGramOptions(villageSelect.value, gramSelect);
            } catch (error) {
                console.error('Error loading the gram:', error);
                toastr.error('Failed to load gram: ' + error.message);
            }
        } else {
            // Reset village dropdown if no valid development block is selected
            resetDropdown(gramFloatSelect, 'Select Gram Panchayat');
        }
    });
});

async function updateDevelopmentOptions(districtId, developmentBlockSelect) {
    const data = await fetchOptions(`/api/developmentBlocksByDistrict/${districtId}`);
    updateDropdown(developmentBlockSelect, data, 'Select Development Block');
}

async function updateVillageOptions(developmentBlockId, villageSelect) {
    const data = await fetchOptions(`/api/villagesByDevelopmentBlock/${developmentBlockId}`);
    updateDropdown(villageSelect, data, 'Select Village');
}

async function updateGramOptions(villageSelectId, gramSelect) {
    const data = await fetchOptions(`/api/gramPanchayatsByVillage/${villageSelectId}`);
    updateDropdown(gramSelect, data, 'Select Gram Panchayat');
}

async function updateRangeOptions(divisionSelectId, rangeSelect) {
    const data = await fetchOptions(`/api/rangesByDivision/${divisionSelectId}`);
    updateDropdown(rangeSelect, data, 'Select Range');
}

async function fetchOptions(url) {
    const response = await fetch(url);
    if (!response.ok) {
        throw new Error('Network response was not ok: ' + response.statusText);
    }
    return await response.json();
}

function updateDropdown(selectElement, data, defaultOptionText) {
    selectElement.innerHTML = '';
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = defaultOptionText;
    selectElement.appendChild(defaultOption);

    if (data.success && data.data.length > 0) {
        data.data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            selectElement.appendChild(option);
        });
    } else {
        const noOption = document.createElement('option');
        noOption.value = '';
        noOption.textContent = 'No options available';
        noOption.disabled = true;
        selectElement.appendChild(noOption);
    }
}

function resetDropdown(selectElement, defaultOptionText) {
    selectElement.innerHTML = '';
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = defaultOptionText;
    selectElement.appendChild(defaultOption);
}
