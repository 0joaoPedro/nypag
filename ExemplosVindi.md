### Integração Vindi

Como criar uma nova assinatura (pagamento):

- Criar um customer (usuário) **(Descrito na seção Customer)**
- Criar um product (produto, Ex.: boleto bancário) **(Descrito na seção Product)**
- Criar um plan (plano, com informações de parcelamento) **(Descrito na seção Plan)**

#### Customer

A rota **[POST] /vindi/customer** contém um exemplo de como deve ser criado um customer na plataforma Vindi.
Os dados do usuário devem ser resgatados pelo model User, e devem ser informados os dados de pagamento (Cartão de crédito).

**Dados necessários:**

- user_id (integer) Id do usuário no banco de dados (Não na Vindi)
- card_number (integer)
- card_expiration (string [00/0000])
- card_cvv (integer)
- payment_company_code (string [mastercard|visa])

#### Product

A rota **[POST] /vindi/product** contém um exemplo de como deve ser criado um produto na plataforma Vindi.
Os dados devem ser enviados via POST.

**Dados necessários:**

- product_name (string)
- product_description (string)
- product_price (float) - Deve ser informado o valor total da compra com taxas aplicadas, não o valor das parcelas.

#### Plan

A rota **/vindi/plan** contém um exemplo de como deve ser criado um plano na plataforma Vindi.
Os dados devem ser enviados via POST

**Dados necessários:**

- plan_name (string)
- plan_description (string)
- plan_installments (integer) Número de parcelas
- product_id (integer) Id de um produto Vindi válido

#### Subscription

A rota **/vindi/subscribe** contém um exemplo de como deve ser feita a assinatura de um cliente na plataforma Vindi. Neste exemplo é criado o produto, o plano, e a assinatura. O cliente informado deve estar previamente cadastrado na plataforma Vindi.
Os dados devem ser enviados via POST

**Dados necessários:**

- user_id (inteer) Id do usuário no banco de dados (Não na Vindi)
- product_name (string)
- product_description (string)
- product_price (float)
- plan_name (string)
- plan_description (string)
- plan_installments (integer) Número de parcelas

### Observações:

Não foi incluída nenhuma validação de dados, então, para utilizar a integração junto ao sistema já existente, é necessário se atentar a isso.