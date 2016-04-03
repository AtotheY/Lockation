package api;

public class SendPurchase {

  public String merchant_id;
  public String medium;
  public String purchase_date;
  public int amount;
  public String status;
  public String description;
    
  public SendPurchase(String purchase_date, int amount, String description) {
    this.merchant_id = "5700b7bccd7569fb1391ad38";
    this.medium = "balance";
    this.purchase_date = purchase_date;
    this.amount = amount;
    this.status = "pending";
    this.description = description;
  }

}