function clear_details(){
	$('#entry_number').html();
	$('#entry_date').html();
	$('#type').html();
	$('#date').html();
	$('#unit').html();
	$('#quote').html();
	$('#add_type').html();
	$('#add_data').html();
	$('#amount').html();
	$('#reference').html();
	$('#description').html();
	$('#attached_file').html();
	$('#created_by').html();
	$('#created_at').html();
	$('#updated_at').html();
	$('#route-id').html();
	$('#btn-file').hide();
}

function view_details(id, route_id = null){
	clear_details();
	url = url_get_document;
	request = "id="+id;
	$.get(url, request, function(data){
		// console.log(url_get_document);
		$('#entry_number').html(data.entry_number);
		$('#entry_date').html(data.entry_date);
		$('#type').html(data.type.name);
		$('#date').html(data.date);
		$('#unit').html(data.unit.name);
		$('#quote').html(data.quote);
		if (data.add_type_id){
			$('#add').show();	
			$('#add_type').html(data.type_add.name);
			$('#add_data').html(data.add_data);
		}
		else{
			$('#add').hide();	
		}
		$('#amount').html(data.amount);
		$('#reference').html(data.reference);
		$('#description').html(data.desc);
		$('#attached_file').html(data.file);
		created_by = data.user_created.username+' ('+data.user_created.first_name+' '+data.user_created.first_surname+')';
		$('#created_by').html(created_by);
		$('#created_at').html(data.created_format);
		$('#updated_at').html(data.updated_format);
		$('#route-id').html(route_id);
		console.log(data.attached_file);
		if (data.attached_file != null){
			$('#btn-file').attr('href', data.attached_file);
			$('#btn-file').show();
		}
	});
};

function delete_document(id){
	url = url_get_document;
	request = "id="+id;
	$.get(url, request, function(data){
		$('#del-id').html(data.id);
		$('#del-type').html(data.type.name);
		$('#del-ref').html(data.reference);
	});
}

function clear_send(){
	$('#form-send')[0].reset();
	$('.help-block').hide();
}

function send(doc_id, route_id = null){
	clear_send();
	url = url_get_document;
	request = "id="+doc_id;
	$.get(url, request, function(data){
		$('#doc_reference').html(data.reference);
		$('#doc_id').val(data.id);
		$('#route_id').val(route_id);
	});
};

$('#btn-cancel').on('click', function(){
	$('#form-send')[0].reset();
	$('.help-block').hide();
});

$('#send').on('click', function(){
	validation = true;
	if ($('#to_id').val() === null){
		$('#error_id').show();
		validation = false;
	}
	else $('#error_id').hide();
	if ($('#msg_reference').val() == ''){
		$('#error_message').show();
		validation = false;
	}
	else $('#error_message').hide();

	if (!validation) 
		return false;

	url = url_send_json_store;
	data = $('#form-send').serialize();
	$.get(url, data, function(data){
		console.log(data);
		$('#modal-send').modal('hide');
		setTimeout(function(){
        	alert('¡Se envió exitosamente!');
    	}, 500);	
	});
	table.ajax.reload();
});

$('#btn_deldoc').on('click', function(){
	url = url_document_destroy;
	request = "id="+$('#del-id').html();
	$.get(url, request, function(data){
		console.log(data);
	});
	table.ajax.reload();
	$('#modal-delete').modal('hide');
});

