let tableCount = 0; // Track the number of sets of tables created

document.getElementById('create-table').addEventListener('click', createTable);

function createTable() {
    tableCount++; // Increment the table count
    const tableContainer = document.createElement('div');
    tableContainer.classList.add('p-1');
    tableContainer.id = `tbl_set[${tableCount}]`; // Set a dynamic id for the container

    // Create a new table element
    const newTable = document.createElement('table');
    newTable.classList.add('custom-table', 'mt-4');

    // Create table header (thead)
    const thead = newTable.createTHead();
    const headerRow = thead.insertRow(0);
    for (let j = 0; j < 2; j++) {
        const cell = document.createElement('th');
        cell.textContent = 'Header ' + (j + 1);
        cell.setAttribute('contenteditable', 'true'); // Allow header cell to be edited
        headerRow.appendChild(cell);
    }

    // Create table body (tbody)
    const tbody = newTable.createTBody();
    for (let i = 0; i < 2; i++) {
        const row = tbody.insertRow(i);
        for (let j = 0; j < 2; j++) {
            const cell = row.insertCell(j);
            cell.setAttribute('contenteditable', 'true'); // Allow data cell to be edited
        }
    }

    // Append the new table to the container
    tableContainer.appendChild(newTable);

    // Create and add buttons for the new table
    const buttonsDiv = document.createElement('div');
    buttonsDiv.classList.add('p-4', 'flex', 'gap-3');

    // Create buttons for the new table set
    const addRowBtn = document.createElement('button');
    addRowBtn.textContent = 'Add Row';
    addRowBtn.addEventListener('click', () => addRow(tableContainer));

    const deleteRowBtn = document.createElement('button');
    deleteRowBtn.textContent = 'Delete Row';
    deleteRowBtn.addEventListener('click', () => deleteRow(tableContainer));

    const addColumnBtn = document.createElement('button');
    addColumnBtn.textContent = 'Add Column';
    addColumnBtn.addEventListener('click', () => addColumn(tableContainer));

    const deleteColumnBtn = document.createElement('button');
    deleteColumnBtn.textContent = 'Delete Column';
    deleteColumnBtn.addEventListener('click', () => deleteColumn(tableContainer));

    buttonsDiv.appendChild(addRowBtn);
    buttonsDiv.appendChild(deleteRowBtn);
    buttonsDiv.appendChild(addColumnBtn);
    buttonsDiv.appendChild(deleteColumnBtn);

    // Append buttons to the container
    tableContainer.appendChild(buttonsDiv);

    // Find the last container and insert the new one after it
    const lastTableContainer = document.querySelector(`div[id^="tbl_set"]:last-child`);
    if (lastTableContainer) {
        lastTableContainer.insertAdjacentElement('afterend', tableContainer);
    } else {
        document.body.appendChild(tableContainer);
    }
}

function addRow(container) {
    const currentTable = container.querySelector('table');
    if (currentTable) {
        const tbody = currentTable.tBodies[0];
        const newRow = tbody.insertRow(tbody.rows.length);
        for (let j = 0; j < currentTable.rows[0].cells.length; j++) {
            const cell = newRow.insertCell(j);
            cell.setAttribute('contenteditable', 'true');
        }
    }
}

function deleteRow(container) {
    const currentTable = container.querySelector('table');
    if (currentTable) {
        const tbody = currentTable.tBodies[0];
        const numRows = tbody.rows.length;

        if (numRows > 1) {
            // Delete the last row from the tbody
            tbody.deleteRow(numRows - 1);

            // Ensure the header row has the same number of cells
            const thead = currentTable.tHead;
            thead.rows[0].deleteCell(numRows - 1);
        }
    }
}

function addColumn(container) {
    const currentTable = container.querySelector('table');
    if (currentTable) {
        const thead = currentTable.tHead;
        const tbody = currentTable.tBodies[0];
        const numColumns = currentTable.rows[0].cells.length;

        // Add a new cell to the header row
        const headerCell = document.createElement('th');
        headerCell.textContent = 'Header ' + (numColumns + 1);
        headerCell.setAttribute('contenteditable', 'true');
        thead.rows[0].appendChild(headerCell);

        // Add a new cell to each data row
        for (let i = 0; i < currentTable.rows.length; i++) {
            const cell = tbody.rows[i].insertCell(numColumns);
            cell.setAttribute('contenteditable', 'true');
        }
    }
}

function deleteColumn(container) {
    const currentTable = container.querySelector('table');
    if (currentTable) {
        const thead = currentTable.tHead;
        const tbody = currentTable.tBodies[0];
        const numColumns = currentTable.rows[0].cells.length;

        if (numColumns > 1) {
            // Delete the last cell from the header row
            thead.rows[0].deleteCell(numColumns - 1);

            // Delete the last cell from each data row
            for (let i = 0; i < currentTable.rows.length; i++) {
                tbody.rows[i].deleteCell(numColumns - 1);
            }
        }
    }
}
