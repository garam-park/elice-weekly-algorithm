max,req = list(map(int, input().split()))
outs = list(map(int, input().split()))

def move(max,index):
    r = 1 - index
    l = max + 1 -index

    ret = r if abs(r)<abs(l) else l

    return ret

def change(max,outs,move):
    for key, index in enumerate(outs):
        index = index+move

        if index > max :
            index = index - max
        

        if index <= 0 :
            index = max + index

        outs[key] = index

    return outs

count = 0

for key in range(0,req):
    mv = move(max,outs[key]);
    outs = change(max,outs,mv);
    max = max-1;
    outs = change(max,outs,-1);
    count+=abs(mv);

print(count)