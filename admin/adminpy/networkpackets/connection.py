import pyshark
import csv

def sanitize_pcap_file(original_file_path, csv_file):
    try:
        # Open the original pcap file
        cap = pyshark.FileCapture(original_file_path)

        with open(csv_file, 'w') as f:
            f.write('Source_Address,Destination_Address,Protocol,Source_Port,Destination_Port,Length\n')  # Write header to CSV file
            for packet in cap:
                if 'ip' in packet.layers[1].layer_name:
                    src = packet.ip.src
                    dst = packet.ip.dst
                    length = packet.length
                    #Check for Protocol Number to match with Name
                    if packet.ip.proto == "1":
                        proto = "ICMP"
                    elif packet.ip.proto == "2":
                        proto = "IGMP"
                    elif packet.ip.proto == "4":
                        proto = "IPIP"
                    elif packet.ip.proto == "6":
                        proto = "TCP"
                    elif packet.ip.proto == "8":
                        proto = "EGP"
                    elif packet.ip.proto == "9":
                        proto = "IGRP"
                    elif packet.ip.proto == "17":
                        proto = "UDP"
                    elif packet.ip.proto == "33":
                        proto = "DCCP"
                    elif packet.ip.proto == "41":
                        proto = "IPv6"
                    elif packet.ip.proto == "46":
                        proto = "RSVP"
                    elif packet.ip.proto == "47":
                        proto = "GRE"
                    elif packet.ip.proto == "50":
                        proto = "ESP"
                    elif packet.ip.proto == "51":
                        proto = "AH"
                    elif packet.ip.proto == "83":
                        proto = "VINES"
                    elif packet.ip.proto == "88":
                        proto = "EIGRP"
                    elif packet.ip.proto == "89":
                        proto = "OSPF"
                    elif packet.ip.proto == "103":
                        proto = "PIM"
                    elif packet.ip.proto == "112":
                        proto = "VRRP"
                    elif packet.ip.proto == "115":
                        proto = "L2TP"
                    elif packet.ip.proto == "132":
                        proto = "SCTP"
                    else:
                        proto = packet.ip.proto
                    #Open User Datagram Layer in Wireshark
                    if "udp" in packet.layers[2].layer_name:
                        srcport = packet.udp.srcport
                        dstport = packet.udp.dstport
                else:
                    continue
                f.write(f'{src},{dst},{proto},{srcport},{dstport},{length}\n')

        def read_csv_file(file_path):
            data = []
            with open(file_path, 'r') as csv_file:
                csv_reader = csv.reader(csv_file)
                for row in csv_reader:
                    data.append(row)
            return data
    finally:
        # Close the pcap files
        cap.close()

# Pcap File Path:
original_file = "../../adminjs/network_data/localnetworktraffic.pcap"
csv_file = '../../adminjs/network_data/localnetworktraffic.csv'

# Call the function to Create .CSV File
sanitize_pcap_file(original_file, csv_file)