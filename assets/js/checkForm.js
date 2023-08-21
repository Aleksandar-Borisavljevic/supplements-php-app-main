function checkForm(formName) {
    console.log(formName);
    switch (formName) {
        case 'login':
            const loginEmail = document.getElementById('loginContact').value;
            const loginPassword = document.getElementById('loginPassword').value;
            if (loginEmail && loginPassword) {
                document.getElementById('logIn').removeAttribute('disabled');
            } else {
                document.getElementById('logIn').setAttribute('disabled', true);
            }
        case 'registration':
            const registerName = document.getElementById('registrationName').value;
            const registerLastName = document.getElementById('registrationLastName').value;
            const registerEmail = document.getElementById('registrationContact').value;
            const registerPassword = document.getElementById('registrationPassword').value;
            const registerConfirmPassword = document.getElementById('registrationConfirmPassword').value;

            if (registerName && registerLastName && registerEmail && registerPassword && registerConfirmPassword) {
                document.getElementById('registerBtn').removeAttribute('disabled');
            } else {
                document.getElementById('registerBtn').setAttribute('disabled', true);
            }
        case 'editUser':
            const editName = document.getElementById('editName').value;
            const editLastName = document.getElementById('editLastName').value;
            const editContact = document.getElementById('editContact').value;
            if (editName && editLastName && editContact) {
                document.getElementById('editUserBtn').removeAttribute('disabled');
            } else {
                document.getElementById('editUserBtn').setAttribute('disabled', true);
            }
        case 'contact':
            const nameContact = document.getElementById('nameContact').value;
            const contactEmail = document.getElementById('emailContact').value;
            const contactMessage = document.getElementById('messageContact').value;
            if (nameContact && contactEmail && contactMessage) {
                document.getElementById('contactBtn').removeAttribute('disabled');
            } else {
                document.getElementById('contactBtn').setAttribute('disabled', true);
            }
        case 'addSupplement':
            const supplementName = document.getElementById('supplementName').value;
            const supplementBrand = document.getElementById('supplementBrand').value;
            const supplementType = document.getElementById('supplementType').value;
            const availableArticles = document.getElementById('availableArticles').value;
            const supplementPrice = document.getElementById('supplementPrice')

            if (supplementName && supplementBrand && supplementType && availableArticles && (supplementPrice || supplementPrice == 0)) {
                document.getElementById('addSupplementId').removeAttribute('disabled');
            } else {
                document.getElementById('addSupplementId').setAttribute('disabled', true);
            }
        case 'editSupplement':
            const editsupplementName = document.getElementById('editSupplementName').value;
            const editsupplementBrand = document.getElementById('editSupplementBrand').value;
            const editsupplementType = document.getElementById('editSupplementType').value;            
            const editavailableArticles = document.getElementById('editAvailableArticles').value;
            const editSupplementPrice = document.getElementById('editSupplementPrice').value;
            

            if (editsupplementName && editsupplementBrand && editsupplementType && editavailableArticles && (editSupplementPrice || editSupplementPrice == 0)) {
                document.getElementById('editSupplementBtn').removeAttribute('disabled');
            } else {
                document.getElementById('editSupplementBtn').setAttribute('disabled', true);
            }
        case 'order':
            const orderArticle = document.getElementById('orderArticle').value;
            if (orderArticle) {
                document.getElementById('orderBtn').removeAttribute('disabled');
            } else {
                document.getElementById('orderBtn').setAttribute('disabled', true);
            }
        case 'search':
            const searchSupplement = document.getElementById('searchSupplement').value;
            const searchType = document.getElementById('searchType').value;
            const searchBrand = document.getElementById('searchBrand').value;
            
            if (searchSupplement || searchType || searchBrand) {
                document.getElementById('searchId').removeAttribute('disabled');
            } else {
                document.getElementById('searchId').setAttribute('disabled', true);
            }  
    }
}