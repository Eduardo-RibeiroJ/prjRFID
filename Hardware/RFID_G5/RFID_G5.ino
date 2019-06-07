/*
 * Inserindo UID do cartão no banco de dados MYSQL
 * Autor: Coworking Parque Tecnologico - G5
 * Controle de Estoque RFID
 * 
 * Bibliotecas: MYSQL + Ethernet + MFRC522
 */
#include <Ethernet.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
#include <SPI.h>
#include <MFRC522.h>

/*
 * Define os Pinos SDA(SS_PIN) e Pino RST(RST_PIN)
 */
#define SS_PIN 7
#define RST_PIN 6

/**
 * PINOUT - Configurações validas para Arduino UNO
 * Os Pinos RST e SDA(SS) geralmente são utilizados nas portas RST(9) e SDA(10)
 * porém esses pinos são utilizado pelo shild ethernet, então optamos por
 * muda-los para as portas 6 e 7
 * --------------------------------------------------------------
 * RST      = 6 (Configurado no define acima)
 * SDA(SS)  = 10 (Configurado no define acima)
 * MOSI     = 11
 * MISO     = 12
 * SCK      = 13
 */

/**
 * Configurações do MYSQL e do Shild Ethernet
 */
byte mac_addr[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //MAC ADDRESS SHILD
bool conectado = false;                                   // Variavel de controle conexão

IPAddress server_addr(177,55,116,99);    //IP do servidor MYSQL
char user[] = "rfid_coworking";          //Usuario MYSQL
char password[] = "rfid_coworking#";     //Senha MYSQL

char sentenca[128];                                                           //Variavel para armazenar a sentença final do MYSQL 
char INSERIR_CARTAO[] = "INSERT INTO movimentacao (cartao) VALUES (\"%s\")";  //Query MYSQL
char BANCODEDADOS[] = "USE rfid";                                             //Banco de dados Utilizado

/**
 * Instanciamos o sensor RFID, o Ethernet client e o Mysql
 */
MFRC522 mfrc522(SS_PIN, RST_PIN);
EthernetClient client;
MySQL_Connection conn((Client *)&client);
 
void setup() 
{ 
   Serial.begin(115200);
   SPI.begin();  
   mfrc522.PCD_Init();
   
   while (!Serial); 
   Ethernet.begin(mac_addr);
   Serial.println("Conectando...");
    
   while(!conectado){
      conectado = conn.connect(server_addr, 41890, user, password);
      if(conectado){
        Serial.println("Conectado");
        delay(1000);
        
        MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
        cur_mem->execute(BANCODEDADOS);
        delete cur_mem;
      }
      else{
        Serial.println("A conexão falhou");
        conn.close();
      }
   }
   
}
 
 
void loop() 
{
    if ( ! mfrc522.PICC_IsNewCardPresent()) 
    {
      return;
    }
    if ( ! mfrc522.PICC_ReadCardSerial()) 
    {
      return;
    }

    String conteudo= "";
    for (byte i = 0; i < mfrc522.uid.size; i++) 
    {=
       conteudo.concat(String(mfrc522.uid.uidByte[i], HEX));
    }
    Serial.println(conteudo);

    int str_len = conteudo.length() + 1; 
    char uid_cartao[str_len];
    conteudo.toCharArray(uid_cartao, str_len);
  
   Serial.println("Executando sentença");
   sprintf(sentenca, INSERIR_CARTAO, uid_cartao);
   
   MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
   cur_mem->execute(sentenca);
   Serial.println(sentenca);
   delete cur_mem;
 
   delay(100);
}
