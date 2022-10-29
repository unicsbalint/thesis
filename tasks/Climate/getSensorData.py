import sys
import seeed_dht
def main():
    sensor = seeed_dht.DHT("22", 13)

    humi, temp = sensor.read()


    if len(sys.argv) < 2:
        print("asd")
        sys.exit()

    requestedData = sys.argv[1]
    if requestedData == "temp":
        print(round(temp,1))
    
    elif requestedData == "humi":
        print(round(humi,1))

if __name__ == '__main__':
    main()
