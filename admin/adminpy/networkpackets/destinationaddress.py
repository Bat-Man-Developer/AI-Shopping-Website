import csv
import re

#1. Create Empty lists
dst_adr_data = []
list_dst_adr_data = []

def read_csv_file(file_path):
  data = []
  with open(file_path, 'r') as csv_file:
      csv_reader = csv.reader(csv_file)
      for row in csv_reader:
          data.append(row)
  return data

#2. Usage example:
file_path = '../../adminjs/network_data/localnetworktraffic.csv'
csv_data = read_csv_file(file_path)

#3. Append packet data to list variable
for row in csv_data:
    if row[1] != "":
      dst_adr_data.append(row[1])
    else:
      dst_adr_data.append("none")

#4. Functions for returning Packet Attributes
def destinationAddress():
  #Turn list into string
  str = " ".join(dst_adr_data)
  #Turn string back into list
  temp = str.split()
  #Iterate through list
  for item in temp:
    if item != "Destination_Address":
      list_dst_adr_data.append(item)

  return list_dst_adr_data

#5. Call the function to return Packet data
print(destinationAddress())
