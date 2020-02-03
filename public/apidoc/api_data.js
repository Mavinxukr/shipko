define({ "api": [
  {
    "type": "post",
    "url": "admin/login",
    "title": "Login User",
    "name": "Login_User",
    "version": "1.1.1",
    "group": "Admin_Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/login"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auth/AuthController.php",
    "groupTitle": "Admin_Auth"
  },
  {
    "type": "post",
    "url": "admin/logout",
    "title": "Logout User",
    "name": "Logout_User",
    "version": "1.1.1",
    "group": "Admin_Auth",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/logout"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auth/AuthController.php",
    "groupTitle": "Admin_Auth"
  },
  {
    "type": "delete",
    "url": "admin/delete-client/{id}",
    "title": "Delete Client",
    "name": "Delete_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-client/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "get",
    "url": "admin/get-clients",
    "title": "Show All Clients",
    "name": "Show_All_Clients",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-clients"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "get",
    "url": "admin/get-client/{id}",
    "title": "Show Client By Id",
    "name": "Show_Client_By_Id",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-client/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "post",
    "url": "admin/store-client",
    "title": "Store Client",
    "name": "Store_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone exp - 380000000000</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Country</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>City</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "zip",
            "description": "<p>Zip</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "card_number",
            "description": "<p>Card number exp - 1234-1234-1234-1234</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client image</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-client"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "post",
    "url": "admin/update-client/{id}",
    "title": "Update Client",
    "name": "Update_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone exp - +380-00-00-00-000</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Country</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>City</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "zip",
            "description": "<p>Zip</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "card_number",
            "description": "<p>Card number exp - 1234-1234-1234-1234</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client image</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-client/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "get",
    "url": "admin/get-clients-by-filters",
    "title": "Show All Clients By Filters",
    "name": "Show_All_Clients_By_Filters",
    "version": "1.1.1",
    "group": "Admin_Client_Filter",
    "description": "<p>This is the Description. Allow get params for filters exp: id, name, email, phone, address, card_number</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-clients-by-filters"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientFilterController.php",
    "groupTitle": "Admin_Client_Filter"
  }
] });
