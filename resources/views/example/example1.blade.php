@include('partials.headerClient')
<div class="bg-white min-h-screen flex flex-col items-center">

</div>
<style>
    /* Define custom CSS styles for the table */
    .custom-table {
        border-collapse: collapse;
        width: 100%;
        resize: both;
        overflow: auto;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #000;
        padding: 2px;
    }

    .custom-table th {
        background: #f7efef;
        width: 30%;
        height: 30px;
        padding: 2px;
    }

    .custom-table td {
        width: 50px;
        height: 50px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    let currentTable = null;

    document.getElementById('create-table').addEventListener('click', createTable);
    document.getElementById('delete-table').addEventListener('click', deleteTable);
    document.getElementById('add-row').addEventListener('click', addRow);
    document.getElementById('delete-row').addEventListener('click', deleteRow);
    document.getElementById('add-column').addEventListener('click', addColumn);
    document.getElementById('delete-column').addEventListener('click', deleteColumn);

    function createTable() {
        currentTable = document.createElement('table');
        currentTable.classList.add('custom-table', 'mt-4');

        // Create table header (thead)
        const thead = currentTable.createTHead();
        const headerRow = thead.insertRow(0);
        for (let j = 0; j < 2; j++) {
            const cell = document.createElement('th');
            cell.textContent = 'Header ' + (j + 1);
            cell.setAttribute('contenteditable', 'true'); // Allow header cell to be edited
            headerRow.appendChild(cell);
        }

        // Create table body (tbody)
        const tbody = currentTable.createTBody();
        for (let i = 0; i < 2; i++) {
            const row = tbody.insertRow(i);
            for (let j = 0; j < 2; j++) {
                const cell = row.insertCell(j);
                cell.setAttribute('contenteditable', 'true'); // Allow data cell to be edited
            }
        }

        document.getElementById('table-container').innerHTML = '';
        document.getElementById('table-container').appendChild(currentTable);
    }

    function deleteTable() {
        if (currentTable) {
            currentTable.remove();
            currentTable = null;
        }
    }

    function addRow() {
        if (currentTable) {
            const tbody = currentTable.tBodies[0];
            const newRow = tbody.insertRow(tbody.rows.length);
            for (let j = 0; j < currentTable.rows[0].cells.length; j++) {
                const cell = newRow.insertCell(j);
                cell.setAttribute('contenteditable', 'true');
            }
        }
    }

    function deleteRow() {
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

    function addColumn() {
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


    function deleteColumn() {
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
</script>

@include('partials.footerClient')
