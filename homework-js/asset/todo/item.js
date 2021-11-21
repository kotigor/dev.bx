export class Item
{
	titleStr;
	deleteButtonHandler;
	saveButtonHandler;
	container;
	title;
	buttonsContainer;
	deleteButton;
	editButton;


	constructor({title, deleteButtonHandler, saveButtonHandler})
	{
		this.titleStr = String(title);
		if (typeof deleteButtonHandler === 'function')
		{
			this.deleteButtonHandler = deleteButtonHandler;
		}
		if (typeof saveButtonHandler === 'function')
		{
			this.saveButtonHandler = saveButtonHandler;
		}

	}

	getData()
	{
		return {title: this.titleStr};
	}

	render()
	{
		this.container = document.createElement('div');
		this.container.classList.add('item-container');

		this.title = document.createElement('div');
		this.title.classList.add('item-title');
		this.title.innerText = this.titleStr;

		this.buttonsContainer = document.createElement('div');

		this.deleteButton = document.createElement('button');
		this.deleteButton.innerText = 'Delete';
		this.deleteButton.addEventListener('click', this.handleDeleteButtonClick.bind(this));

		this.editButton = document.createElement('button');
		this.editButton.innerText = 'Edit';
		this.editButton.addEventListener('click', this.handleEditButtonClick.bind(this));

		this.buttonsContainer.append(this.deleteButton);
		this.buttonsContainer.append(this.editButton);

		this.container.append(this.title);
		this.container.append(this.buttonsContainer);
		return this.container;
	}

	handleDeleteButtonClick()
	{
		if (this.deleteButtonHandler)
		{
			this.deleteButtonHandler(this);
		}
	}

	handleEditButtonClick()
	{
		this.title.remove();
		this.editButton.remove();
		this.deleteButton.remove();

		const newTitle = document.createElement('input');
		const okButton = document.createElement('button');
		okButton.innerText = 'Save';
		okButton.addEventListener('click', () => {
			this.titleStr = newTitle.value;
			this.saveButtonHandler();
		});
		newTitle.value = this.titleStr;
		this.container.prepend(newTitle);
		this.buttonsContainer.append(okButton);
	}
}